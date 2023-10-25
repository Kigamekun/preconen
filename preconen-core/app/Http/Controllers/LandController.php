<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

        $data = Land::where('lands.user_id',Auth::id())->get();

        return view('land.index',['data'=>$data,'price'=>$solve]);
    }

    public function detail($id)
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
        $data = Land::where('lands.id',$id)->leftJoin('planting_plannings', 'lands.id', '=', 'planting_plannings.land_id')
        ->select('lands.id as id_land','lands.wide','lands.name','lands.information','lands.address','lands.thumb' ,'planting_plannings.*')
        ->first();


        return view('land.detail',['data'=> $data,'price'=>$solve]);
    }


    public function store(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            Storage::disk('public')->put('landImage/'.$filename,file_get_contents($file));
            Land::create([
                'user_id'=>Auth::id(),
                'name'=>$request->name,
                'wide'=>$request->wide,
                'address'=>$request->address,
                'information'=>$request->information,
                'thumb'=>$filename
            ]);
        } else {
            Land::create([
                'user_id'=>Auth::id(),
                'name'=>$request->name,
                'wide'=>$request->wide,
                'address'=>$request->address,
                'information'=>$request->information,
            ]);
        }

        return redirect()->back()->with(['message' => 'Lahan berhasil ditambahkan','status' => 'success']);
    }

    public function update(Request $request,$id)
    {


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            Storage::disk('public')->put('landImage/'.$filename,file_get_contents($file));
            Land::where('id',$id)->update([
                'user_id'=>Auth::id(),
                'name'=>$request->name,
                'wide'=>$request->wide,
                'address'=>$request->address,
                'information'=>$request->information,
                'thumb'=>$filename
            ]);
        } else {
            Land::where('id',$id)->update([
                'user_id'=>Auth::id(),
                'name'=>$request->name,
                'wide'=>$request->wide,
                'address'=>$request->address,
                'information'=>$request->information,
            ]);
        }

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
