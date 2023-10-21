<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as ClientScrapping;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function forecastWeather()
    {
        $client = new \GuzzleHttp\Client();

        $lat = -6.652717778558578;
        $lon = 106.77295302523758;

        // $response = Http::get('http://api.openweathermap.org/data/2.5/forecast/daily?lat=' . $lat . '&lon=' . $lon . '&cnt=16&appid=56b5eb5562cadd6a97a78934fed312c9');
        // $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=temperature_2m&forecast_days=16');

        // dd($response,$response->body());
        $res = '{"city":{"id":1648473,"name":"Bogor","coord":{"lon":106.773,"lat":-6.6527},"country":"ID","population":800000,"timezone":25200},"cod":"200","message":3.6752655,"cnt":16,"list":[{"dt":1697860800,"sunrise":1697840948,"sunset":1697885150,"temp":{"day":306.75,"min":295.29,"max":306.75,"night":296.28,"eve":297.97,"morn":295.29},"feels_like":{"day":308.4,"night":297,"eve":298.62,"morn":295.75},"pressure":989,"humidity":42,"weather":[{"id":502,"main":"Rain","description":"heavy intensity rain","icon":"10d"}],"speed":2.69,"deg":344,"gust":3.38,"clouds":57,"pop":0.89,"rain":31.36},{"dt":1697947200,"sunrise":1697927328,"sunset":1697971551,"temp":{"day":302.88,"min":295.55,"max":303.17,"night":296.24,"eve":298.74,"morn":295.55},"feels_like":{"day":304.27,"night":296.9,"eve":299.34,"morn":296.12},"pressure":1014,"humidity":53,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":2.12,"deg":344,"gust":3.64,"clouds":95,"pop":0.83,"rain":8.17},{"dt":1698033600,"sunrise":1698013709,"sunset":1698057953,"temp":{"day":296.5,"min":294.8,"max":296.84,"night":295.21,"eve":296.41,"morn":294.86},"feels_like":{"day":297.19,"night":295.77,"eve":297.01,"morn":295.51},"pressure":1014,"humidity":88,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.27,"deg":187,"gust":2.57,"clouds":98,"pop":0.95,"rain":25.11},{"dt":1698120000,"sunrise":1698100091,"sunset":1698144355,"temp":{"day":300.56,"min":294.67,"max":302.54,"night":294.95,"eve":299.08,"morn":294.67},"feels_like":{"day":302.32,"night":295.64,"eve":299.69,"morn":295.2},"pressure":1014,"humidity":66,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.8,"deg":326,"gust":2.79,"clouds":71,"pop":0.96,"rain":20.31},{"dt":1698206400,"sunrise":1698186473,"sunset":1698230758,"temp":{"day":300.81,"min":294.74,"max":301.44,"night":295.85,"eve":299.45,"morn":294.74},"feels_like":{"day":302.84,"night":296.55,"eve":299.45,"morn":295.41},"pressure":1015,"humidity":67,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.57,"deg":162,"gust":1.97,"clouds":69,"pop":0.98,"rain":33.1},{"dt":1698292800,"sunrise":1698272856,"sunset":1698317162,"temp":{"day":301.15,"min":295.14,"max":302.02,"night":295.67,"eve":300.45,"morn":295.14},"feels_like":{"day":303.3,"night":296.38,"eve":302.43,"morn":295.8},"pressure":1015,"humidity":66,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":2.22,"deg":201,"gust":2.55,"clouds":40,"pop":0.85,"rain":11.46},{"dt":1698379200,"sunrise":1698359240,"sunset":1698403567,"temp":{"day":301.6,"min":294.33,"max":303.52,"night":295.7,"eve":300.76,"morn":294.33},"feels_like":{"day":303.55,"night":296.33,"eve":302.64,"morn":294.93},"pressure":1014,"humidity":62,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":2.16,"deg":180,"gust":3.01,"clouds":43,"pop":0.86,"rain":5.96},{"dt":1698465600,"sunrise":1698445625,"sunset":1698489972,"temp":{"day":302.25,"min":294.7,"max":304.88,"night":296.18,"eve":300.22,"morn":294.7},"feels_like":{"day":304.04,"night":296.76,"eve":301.87,"morn":295.29},"pressure":1014,"humidity":58,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.05,"deg":30,"gust":5.62,"clouds":8,"pop":0.69,"rain":4.77},{"dt":1698552000,"sunrise":1698532010,"sunset":1698576378,"temp":{"day":302.29,"min":294.67,"max":305.32,"night":296.71,"eve":302.14,"morn":294.67},"feels_like":{"day":303.81,"night":297.21,"eve":303.31,"morn":295.2},"pressure":1014,"humidity":56,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.19,"deg":32,"gust":4.64,"clouds":10,"pop":0.23,"rain":0.72},{"dt":1698638400,"sunrise":1698618397,"sunset":1698662785,"temp":{"day":303.33,"min":294.57,"max":306.17,"night":296.94,"eve":303.84,"morn":294.57},"feels_like":{"day":304.31,"night":297.41,"eve":304.57,"morn":295.09},"pressure":1013,"humidity":49,"weather":[{"id":801,"main":"Clouds","description":"few clouds","icon":"02d"}],"speed":3.87,"deg":45,"gust":5.35,"clouds":11,"pop":0},{"dt":1698724800,"sunrise":1698704784,"sunset":1698749192,"temp":{"day":303.23,"min":294.9,"max":304.83,"night":296.9,"eve":301.92,"morn":294.9},"feels_like":{"day":304.32,"night":297.52,"eve":303.66,"morn":295.43},"pressure":1013,"humidity":50,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":2.06,"deg":354,"gust":3.37,"clouds":100,"pop":0.51,"rain":1.71},{"dt":1698811200,"sunrise":1698791172,"sunset":1698835600,"temp":{"day":301.5,"min":294.83,"max":302.7,"night":296.49,"eve":299.12,"morn":294.83},"feels_like":{"day":303.52,"night":297.1,"eve":299.12,"morn":295.46},"pressure":1012,"humidity":63,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.88,"deg":6,"gust":2.91,"clouds":100,"pop":0.71,"rain":21.41},{"dt":1698897600,"sunrise":1698877562,"sunset":1698922009,"temp":{"day":300.87,"min":295.42,"max":302.35,"night":296.65,"eve":300.31,"morn":295.42},"feels_like":{"day":302.94,"night":297.3,"eve":302.46,"morn":296.05},"pressure":1012,"humidity":67,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.79,"deg":353,"gust":2.35,"clouds":78,"pop":0.76,"rain":13.29},{"dt":1698984000,"sunrise":1698963952,"sunset":1699008419,"temp":{"day":302.69,"min":294.9,"max":304.94,"night":296.41,"eve":301.43,"morn":294.9},"feels_like":{"day":304.78,"night":297.09,"eve":303.4,"morn":295.48},"pressure":1012,"humidity":58,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":2.71,"deg":15,"gust":4.75,"clouds":28,"pop":0.57,"rain":4.15},{"dt":1699070400,"sunrise":1699050343,"sunset":1699094829,"temp":{"day":302.68,"min":295.3,"max":303.34,"night":296.75,"eve":301.89,"morn":295.3},"feels_like":{"day":304.93,"night":297.46,"eve":304.19,"morn":295.95},"pressure":1011,"humidity":59,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.94,"deg":4,"gust":2.25,"clouds":66,"pop":0.69,"rain":7.05},{"dt":1699156800,"sunrise":1699136735,"sunset":1699181240,"temp":{"day":301.72,"min":295.24,"max":302.42,"night":296.57,"eve":300.81,"morn":295.24},"feels_like":{"day":304.18,"night":297.29,"eve":302.95,"morn":295.91},"pressure":1011,"humidity":65,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.88,"deg":23,"gust":2.05,"clouds":97,"pop":0.78,"rain":9.21}]}';
        $data = json_decode($res,TRUE);
        $forecast = [];
        foreach ($data['list'] as $key => $value) {
            $forecast[$key] = $value;
            $forecast[$key]['date'] = date('Y-m-d H:i:s',$value['dt']);
        }

        return $forecast;
        return response()->json(['statusCode' => 200,'message' => 'Success Scratch Data Forecast','data' => ['forecast'=>$forecast]], 200);
    }


    public function scrappingPriceComodity($url,$pattern)
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
