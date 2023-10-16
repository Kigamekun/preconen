<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(): JsonResponse
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=56b5eb5562cadd6a97a78934fed312c9');


        return response()->json(['statusCode'=>200,'message'=>'Success Scratch Data Forecast','data'=>$response->getBody()], 200);
    }
}
