<?php

namespace App\Http\Controllers;

use App\Models\PlantingPlanning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PlantingPlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PlantingPlanning::where('user_id', Auth::id())->first();
        $dataAll = PlantingPlanning::where('user_id', Auth::id())->get();

        $calendar = [];
        foreach ($dataAll as $key => $value) {
            $calendar[$key]['start'] = $value->start_from.'T06:00:00';
            $calendar[$key]['end'] = $value->end_at.'T20:30:00';
            $calendar[$key]['name'] = '-';
            $calendar[$key]['desc'] = '-';
        }
        return view('planting-planning.index',['data'=>$data,'calendar'=>$calendar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $forecast = app('App\Http\Controllers\ForecastController')->forecastWeather();

        $foundData;

        $date = Carbon::now()->toDateString('Y-m-d');
        $date = '2023-11-01';
        foreach ($forecast as $item) {
            if (isset($item['date']) && Str::startsWith($item['date'], $date)) {
                $foundData = $item;
            }
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://127.0.0.1:5000', [
            'multipart' => [
                // [
                //     'name' => 'temperature',
                //     'contents' => '18.44378617'
                // ],
                // [
                //     'name' => 'humidity',
                //     'contents' => '84.05471041'
                // ],
                // [
                //     'name' => 'ph',
                //     'contents' => '7.401589798'
                // ],
                // [
                //     'name' => 'rainfall',
                //     'contents' => '195'
                // ]
                [
                    'name' => 'temperature',
                    'contents' => $foundData['temp']['day'] -273.15
                ],
                [
                    'name' => 'humidity',
                    'contents' => $foundData['humidity']
                ],
                [
                    'name' => 'ph',
                    'contents' => '7.401589798'
                ],
                [
                    'name' => 'rainfall',
                    'contents' => $foundData['rain']
                ]
            ]
        ]);
        $responseBody = $response->getBody()->getContents();



        return view('planting-planning.create',['data'=>json_decode($responseBody,TRUE),'commodities'=>json_decode($responseBody,TRUE)['commodities']]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PlantingPlanning::create([
            'user_id'=>Auth::id(),
            'land_id'=>$request->land,
            'comodity_id'=>$request->comodity,
            'start_from'=>$request->mulai,
            'end_at'=>$request->akhir
        ]);

        return redirect()->route("planting-planning.index")->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PlantingPlanning::where('id',$id)->delete();

        return redirect()->back()->with(['message' => 'Lahan berhasil di delete','status' => 'success']);
    }
}
