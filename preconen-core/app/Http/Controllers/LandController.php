<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LandController extends Controller
{
    public function index(Request $request)
    {
        if (is_null($res = DB::table('scrappings')->where(['date' => Carbon::now()->toDateString('Y-m-d')])->first())) {
            $pangan = app('App\Http\Controllers\ForecastController')->scrappingPriceComodity('https://infoharga.agrojowo.biz/tanaman-pangan-menu/harga-produsen', '/tanaman_pangan___([^\s]+)/');
            $sayuran = app('App\Http\Controllers\ForecastController')->scrappingPriceComodity('https://infoharga.agrojowo.biz/sayuran/sayuran-info-harga-produsen', '/sayuran_produsen___([^\s]+)/');
            $solve = array_merge($pangan, $sayuran);
            DB::table('scrappings')->insert([
                'date' => Carbon::now()->toDateString('Y-m-d'),
                'data' => json_encode($solve),
            ]);
        } else {
            $solve = json_decode($res->data, true);
        }

        $data = Land::where('lands.user_id',Auth::id())->join('planting_plannings', 'lands.id', '=', 'planting_plannings.land_id')
        ->select('lands.*', 'planting_plannings.*')
        ->first();

        return view('land.index',['data'=>$data,'price'=>$solve]);
    }

    public function detail($id)
    {
        $data = $land = Land::where('lands.user_id',Auth::id())->join('planting_plannings', 'lands.id', '=', 'planting_plannings.land_id')
        ->select('lands.*', 'planting_plannings.*')
        ->first();
        return view('land.detail',['data'=> $data]);
    }


    public function store(Request $request)
    {


        Land::create([
            'user_id'=>Auth::id(),
            'name'=>$request->name,
            'wide'=>$request->luas
        ]);

        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        if ($land->file_materi) {
            $filePath = Storage::disk('public')->path('land/' . $land->file_materi);
            File::delete($filePath);
        }
        $land->delete();
        return redirect()->route('land.index')->with(['message' => 'Lahan berhasil di Hapus','status' => 'success']);
    }
}
