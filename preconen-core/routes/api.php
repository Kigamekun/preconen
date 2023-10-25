<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/ph', function (Request $request) {

    // DB::table('lands')->where('id',1)->update(['ph'=>'ada']);


    DB::table('lands')->where('id',$_GET['id'])->update(['ph'=>json_encode(['ph'=>$_GET['ph'],'suhu'=>$_GET['suhu'],'Kelembapan'=>$_GET['Kelembapan']])]);

    return response()->json(['message'=>'berhasil'], 200);

});



Route::get('/suhu', function () {
    return view('landing');
});
