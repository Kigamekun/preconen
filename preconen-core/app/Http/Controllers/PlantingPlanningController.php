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
        $dataAll = PlantingPlanning::where('planting_plannings.user_id', Auth::id())->join('comodities', 'planting_plannings.comodity_id', '=', 'comodities.id')
                    ->join('lands', 'lands.id', '=', 'planting_plannings.land_id')
                    ->select(
                        'planting_plannings.id',
                        'comodities.name as comodity_name',
                        'planting_plannings.start_from',
                        'planting_plannings.end_at',
                        'comodities.potential_results_min',
                        'comodities.potential_results_max',
                        'lands.name',
                        'lands.wide as area'
                    )->get();

        $calendar = [];
        foreach ($dataAll as $key => $value) {
            $calendar[$key]['start'] = $value->start_from . 'T06:00:00';
            $calendar[$key]['end'] = $value->end_at . 'T20:30:00';
            $calendar[$key]['name'] = '-';
            $calendar[$key]['desc'] = '-';
        }
        return view('planting-planning.index', ['data' => $dataAll,'calendar' => $calendar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        $forecast = app('App\Http\Controllers\ForecastController')->forecastWeather();

        $foundData;

        $date = Carbon::now()->toDateString('Y-m-d');
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
                    'contents' => $foundData['temp']['day'] - 273.15
                ],
                [
                    'name' => 'humidity',
                    'contents' => $foundData['humidity']
                ],
                [
                    'name' => 'ph',
                    'contents' => '7'
                ],
                [
                    'name' => 'rainfall',
                    'contents' => $foundData['rain']
                ]
            ]
        ]);
        $responseBody = $response->getBody()->getContents();



        return view('planting-planning.create', ['data' => json_decode($responseBody, true),'commodities' => json_decode($responseBody, true)['commodities']]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PlantingPlanning::create([
            'user_id' => Auth::id(),
            'land_id' => $request->land,
            'comodity_id' => $request->comodity,
            'start_from' => $request->mulai,
            'end_at' => $request->akhir
        ]);

        return redirect()->route("planting-planning.index")->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
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
        return view('planting-planning.detail',['data'=>$data,'calendar'=>$calendar]);
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
        PlantingPlanning::where('id', $id)->delete();

        return redirect()->back()->with(['message' => 'Lahan berhasil di delete','status' => 'success']);
    }
}
