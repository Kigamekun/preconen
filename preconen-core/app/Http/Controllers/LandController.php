<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index(Request $request)
    {
        $solve = [];
        $solve[] = app('App\Http\Controllers\ForecastController')->scrapping('https://infoharga.agrojowo.biz/info-hari-ini/tanaman-pangan','/tanaman_pangan___([^\s]+)/');
        $solve[] = app('App\Http\Controllers\ForecastController')->scrapping('https://infoharga.agrojowo.biz/info-hari-ini/buah','/buah_produsen___([^\s]+)/');
        $solve[] = app('App\Http\Controllers\ForecastController')->scrapping('https://infoharga.agrojowo.biz/info-hari-ini/sayuran','/sayuran_produsen___([^\s]+)/');
        $solve[] = app('App\Http\Controllers\ForecastController')->scrapping('https://infoharga.agrojowo.biz/info-hari-ini/perkebunan','/perkebunan___([^\s]+)/');

        return view('user.land');
    }

    public function guest(Request $request)
    {
        if ($request->ajax()) {
            $data = Land::whereNull('deleted_at')->get();
            return DataTables::of($data)
            ->addIndexColumn()

            ->make(true);
        }
        return view('land.guest');
    }

    public function store(CreateLandRequest $request)
    {
        $this->validate($request, [
            'file_materi' => 'required|file|mimes:pdf|max:30720',
        ]);

        Land::create([
            'plants'=>'wortel',
            'luas'=>200
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
        return redirect()->back()->with(['message' => 'Lahan berhasil di Hapus','status' => 'success']);
    }
}
