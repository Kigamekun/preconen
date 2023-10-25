<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as ClientScrapping;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ForecastController extends Controller
{
    public function forecastWeather()
    {
        $client = new \GuzzleHttp\Client();

        $lat = Auth::user()->lat;
        $long = Auth::user()->long;
        if (is_null($res = DB::table('forecasts')->where(['lat'=>Auth::user()->lat,'long'=>Auth::user()->long,'date'=>Carbon::now()->toDateString('Y-m-d')])->first())) {
            $response = Http::get('http://api.openweathermap.org/data/2.5/forecast/daily?lat=' . $lat . '&lon=' . $long . '&lang=id' .'&cnt=16&appid=56b5eb5562cadd6a97a78934fed312c9');
            $res = $response->body();
            $data = json_decode($res, true);
            
            DB::table('forecasts')->insert([
                'lat' => Auth::user()->lat,
                'long' => Auth::user()->long,
                'date' => Carbon::now()->toDateString('Y-m-d'),
                'data' => $res,
            ]);
        }else {
            $data = json_decode($res->data,true);
        }

        $forecast = [];
        foreach ($data['list'] as $key => $value) {
            $forecast[$key] = $value;
            $forecast[$key]["city"] = $data["city"];
            $forecast[$key]['date'] = date('Y-m-d H:i:s', $value['dt']);
        }
        return $forecast;
        return response()->json(['statusCode' => 200,'message' => 'Success Scratch Data Forecast','data' => ['forecast' => $forecast]], 200);
    }


    public function scrappingPriceComodity($url, $pattern)
    {

        $labelScrapping = [
            ['nama' => 'Gabah Kering Panen', 'kode' => 'GKP'],
            ['nama' => 'Jagung Pipilan Kering', 'kode' => 'JPK'],
            ['nama' => 'Cabai Merah Keriting', 'kode' => 'CMK'],
            ['nama' => 'Cabai Merah Besar', 'kode' => 'CMB'],
        ];

        $client = new ClientScrapping();

        $website = $client->request('GET', $url);
        $htmlContent = $website->filter('.fabrik_calculations')->html();

        $data = [];

        if (preg_match_all($pattern, $htmlContent, $matches, PREG_SET_ORDER)) {
            $data = [];
            foreach ($matches as $match) {
                $nama = explode('_', strtoupper($match[1]));
                $initials = implode('', array_map(function ($name) {
                    return substr($name, 0, 1);
                }, $nama));
                $names = array_column($labelScrapping, 'kode');
                if (in_array($initials, $names)) {
                    $data[] = ['nama' => $initials];
                }
            }
            $jsonOutput = json_encode($data);
        } else {
            echo "No matches found.";
        }
        $pattern = '/<span class="calclabel">(R|Total):<\/span>\s*([\d.]+)/';
        if (preg_match_all($pattern, $htmlContent, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $key => $match) {
                $totalValue = $match[2];
                $cleanedNumber = str_replace('.', '', $totalValue);
                $integerNumber = (int)$cleanedNumber;
                $data[$key]['total'] = $integerNumber;
            }
        } else {
            echo "Total not found";
        }

        $solve = [];
        foreach ($data as $key => $value) {
            try {
                $solve[$value['nama']] = $value;

            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return $solve;
        return response()->json(['statusCode' => 200,'message' => 'Success scrapping data','data' => $data], 200);
    }



}
