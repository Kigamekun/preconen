<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
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
        

        $forecast = app('App\Http\Controllers\ForecastController')->forecastWeather();
        return view('dashboard', ['price' => $solve,'forecast' => $forecast]);
    }
}
