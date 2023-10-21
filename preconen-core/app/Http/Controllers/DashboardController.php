<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {


        $pangan = app('App\Http\Controllers\ForecastController')->scrappingPriceComodity('https://infoharga.agrojowo.biz/tanaman-pangan-menu/harga-produsen','/tanaman_pangan___([^\s]+)/');
        $sayuran = app('App\Http\Controllers\ForecastController')->scrappingPriceComodity('https://infoharga.agrojowo.biz/sayuran/sayuran-info-harga-produsen','/sayuran_produsen___([^\s]+)/');
        $solve = array_merge($pangan,$sayuran);

        $forecast = app('App\Http\Controllers\ForecastController')->forecastWeather();
        return view('dashboard',['price'=>$solve,'forecast'=>$forecast]);
    }
}
