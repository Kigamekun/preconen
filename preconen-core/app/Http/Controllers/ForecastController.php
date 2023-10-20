<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as ClientScrapping;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        $lat = -6.652717778558578;
        $lon = 106.77295302523758;

        // $response = Http::get('http://api.openweathermap.org/data/2.5/forecast/daily?lat=' . $lat . '&lon=' . $lon . '&cnt=16&appid=56b5eb5562cadd6a97a78934fed312c9');
        // $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&hourly=temperature_2m&forecast_days=16');

        $res = '{"city":{"id":1648473,"name":"Bogor","coord":{"lon":106.773,"lat":-6.6527},"country":"ID","population":800000,"timezone":25200},"cod":"200","message":11.3539851,"cnt":16,"list":[{"dt":1697601600,"sunrise":1697581813,"sunset":1697625951,"temp":{"day":304.86,"min":295.47,"max":304.99,"night":296.66,"eve":299.19,"morn":296.87},"feels_like":{"day":305.73,"night":297.05,"eve":299.19,"morn":297.13},"pressure":999,"humidity":44,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.01,"deg":14,"gust":4.36,"clouds":68,"pop":0.42,"rain":1.25},{"dt":1697688000,"sunrise":1697668191,"sunset":1697712350,"temp":{"day":305.48,"min":294.78,"max":305.48,"night":295.65,"eve":299.59,"morn":294.78},"feels_like":{"day":306.1,"night":296.2,"eve":299.59,"morn":295.19},"pressure":1012,"humidity":41,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.55,"deg":353,"gust":4.84,"clouds":65,"pop":0.65,"rain":3.43},{"dt":1697774400,"sunrise":1697754569,"sunset":1697798749,"temp":{"day":305.87,"min":294.45,"max":305.87,"night":297.35,"eve":299.79,"morn":294.45},"feels_like":{"day":306.3,"night":297.78,"eve":299.79,"morn":294.96},"pressure":1013,"humidity":39,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.75,"deg":13,"gust":4.46,"clouds":93,"pop":0.5,"rain":0.89},{"dt":1697860800,"sunrise":1697840948,"sunset":1697885150,"temp":{"day":303.95,"min":295.49,"max":304.16,"night":295.85,"eve":297.78,"morn":295.49},"feels_like":{"day":305.44,"night":296.55,"eve":298.41,"morn":295.95},"pressure":1013,"humidity":50,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.69,"deg":101,"gust":2.51,"clouds":94,"pop":0.89,"rain":17.2},{"dt":1697947200,"sunrise":1697927328,"sunset":1697971551,"temp":{"day":301.52,"min":295.18,"max":302,"night":296.26,"eve":299.28,"morn":295.18},"feels_like":{"day":303.16,"night":296.9,"eve":299.28,"morn":295.76},"pressure":1014,"humidity":60,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":2.94,"deg":357,"gust":2.51,"clouds":96,"pop":0.74,"rain":13.16},{"dt":1698033600,"sunrise":1698013709,"sunset":1698057953,"temp":{"day":300.52,"min":295.13,"max":301.92,"night":295.74,"eve":299.64,"morn":295.13},"feels_like":{"day":302.55,"night":296.43,"eve":299.64,"morn":295.81},"pressure":1014,"humidity":69,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.36,"deg":120,"gust":1.74,"clouds":78,"pop":0.9,"rain":33.79},{"dt":1698120000,"sunrise":1698100091,"sunset":1698144355,"temp":{"day":301.96,"min":295.49,"max":303.27,"night":295.59,"eve":299.74,"morn":295.49},"feels_like":{"day":303.87,"night":296.27,"eve":299.74,"morn":296.13},"pressure":1014,"humidity":60,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.87,"deg":338,"gust":2.37,"clouds":36,"pop":0.87,"rain":10.9},{"dt":1698206400,"sunrise":1698186473,"sunset":1698230758,"temp":{"day":301.41,"min":294.86,"max":303,"night":295.92,"eve":299.41,"morn":294.86},"feels_like":{"day":303.37,"night":296.55,"eve":299.41,"morn":295.46},"pressure":1014,"humidity":63,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.58,"deg":10,"gust":3.07,"clouds":54,"pop":0.82,"rain":12.38},{"dt":1698292800,"sunrise":1698272856,"sunset":1698317162,"temp":{"day":301.21,"min":294.48,"max":301.97,"night":295.56,"eve":299.85,"morn":294.48},"feels_like":{"day":303.04,"night":296.23,"eve":301.51,"morn":295.04},"pressure":1014,"humidity":63,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.78,"deg":185,"gust":2.33,"clouds":18,"pop":0.96,"rain":15.04},{"dt":1698379200,"sunrise":1698359240,"sunset":1698403567,"temp":{"day":301.05,"min":295.1,"max":302.45,"night":296.23,"eve":300.11,"morn":295.1},"feels_like":{"day":303.13,"night":296.94,"eve":301.94,"morn":295.73},"pressure":1014,"humidity":66,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.29,"deg":178,"gust":1.73,"clouds":45,"pop":0.97,"rain":9.99},{"dt":1698465600,"sunrise":1698445625,"sunset":1698489972,"temp":{"day":301.39,"min":294.86,"max":302.92,"night":295.96,"eve":300.63,"morn":294.86},"feels_like":{"day":303.73,"night":296.67,"eve":302.43,"morn":295.49},"pressure":1015,"humidity":66,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.68,"deg":170,"gust":2.17,"clouds":22,"pop":0.83,"rain":8.42},{"dt":1698552000,"sunrise":1698532010,"sunset":1698576378,"temp":{"day":301.69,"min":295.03,"max":302.33,"night":296.02,"eve":299.8,"morn":295.03},"feels_like":{"day":303.84,"night":296.71,"eve":299.8,"morn":295.65},"pressure":1015,"humidity":63,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":2.1,"deg":28,"gust":2.62,"clouds":77,"pop":0.83,"rain":12.7},{"dt":1698638400,"sunrise":1698618397,"sunset":1698662785,"temp":{"day":302,"min":294.95,"max":302.67,"night":295.82,"eve":301.01,"morn":294.95},"feels_like":{"day":304.08,"night":296.47,"eve":302.95,"morn":295.59},"pressure":1015,"humidity":61,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.62,"deg":194,"gust":2.03,"clouds":55,"pop":0.75,"rain":6.43},{"dt":1698724800,"sunrise":1698704784,"sunset":1698749192,"temp":{"day":301.93,"min":294.63,"max":303.21,"night":295.36,"eve":299.85,"morn":294.63},"feels_like":{"day":304.11,"night":295.96,"eve":301.51,"morn":295.21},"pressure":1013,"humidity":62,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":2.23,"deg":272,"gust":4.41,"clouds":17,"pop":0.78,"rain":8.19},{"dt":1698811200,"sunrise":1698791172,"sunset":1698835600,"temp":{"day":300.91,"min":294.98,"max":302.21,"night":295.95,"eve":299.05,"morn":294.99},"feels_like":{"day":302.78,"night":296.61,"eve":299.65,"morn":295.58},"pressure":1013,"humidity":65,"weather":[{"id":501,"main":"Rain","description":"moderate rain","icon":"10d"}],"speed":1.78,"deg":359,"gust":2.09,"clouds":99,"pop":0.85,"rain":17.21},{"dt":1698897600,"sunrise":1698877562,"sunset":1698922009,"temp":{"day":300.65,"min":294.69,"max":301.14,"night":295.88,"eve":299.09,"morn":294.69},"feels_like":{"day":302.67,"night":296.58,"eve":299.72,"morn":295.25},"pressure":1013,"humidity":68,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":1.3,"deg":176,"gust":2.36,"clouds":13,"pop":0.91,"rain":13.21}]}';
        $data = json_decode($res,TRUE);
        $forecast = [];
        foreach ($data['list'] as $key => $value) {
            $forecast[$key] = $value;
            $forecast[$key]['date'] = date('Y-m-d H:i:s',$value['dt']);
        }
        return response()->json(['statusCode' => 200,'message' => 'Success Scratch Data Forecast','data' => ['forecast'=>$forecast]], 200);
    }
    public function scratch()
    {

        $labelScrapping = [
            ['nama' => 'Gabah Kering Panen', 'kode' => 'GKP'],
            ['nama' => 'Gabah Kering Giling', 'kode' => 'GKG'],
            ['nama' => 'Beras Medium', 'kode' => 'BM'],
            ['nama' => 'Beras Premium', 'kode' => 'BP'],
            ['nama' => 'Jagung Pipilan Kering', 'kode' => 'JPK'],
            ['nama' => 'Kedelai Lokal Biji Kering', 'kode' => 'KLBK'],
            ['nama' => 'Kedelai Impor', 'kode' => 'KI'],
            ['nama' => 'Kacang Hijau Biji Kering', 'kode' => 'KHBK'],
            ['nama' => 'Kacang Tanah Lokal Polong Basah', 'kode' => 'KTLPB'],
            ['nama' => 'Kacang Tanah Impor', 'kode' => 'KTI'],
            ['nama' => 'Kacang Tanah Lokal Ose 8mm', 'kode' => 'KTLO8'],
            ['nama' => 'Ubi Kayu Basah', 'kode' => 'UKB'],
            ['nama' => 'Ubi Jalar Basah', 'kode' => 'UJB'],
            ['nama' => 'Gaplek Gelondongan', 'kode' => 'GG'],
            ['nama' => 'Porang', 'kode' => 'P'],
            ['nama' => 'Porang Kering', 'kode' => 'PK'],
        ];

        $client = new ClientScrapping();

        $website = $client->request('GET', 'https://infoharga.agrojowo.biz/info-hari-ini/tanaman-pangan');
        $htmlContent = $website->filter('.fabrik_calculations')->html();

        $data = [];
        $pattern = '/tanaman_pangan___([^\s]+)/';

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

        return response()->json(['statusCode' => 200,'message' => 'Success scrapping data','data' => $data], 200);
    }



}
