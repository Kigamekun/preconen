<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as ClientScrapping;
use Symfony\Component\DomCrawler\Crawler;

class ForecastController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();


        $lat = -6.652717778558578;
        $lon = 106.77295302523758;

        $response = $client->request('GET', 'api.openweathermap.org/data/2.5/forecast/daily?lat=' . $lat . '&lon=' . $lon . '&cnt=16&appid=56b5eb5562cadd6a97a78934fed312c9');


        return response()->json(['statusCode' => 200,'message' => 'Success Scratch Data Forecast','data' => $response->getBody()], 200);
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

        return response()->json(['statusCode' => 200,'message' => 'Success scrapping data','data' => $jsonOutput], 200);
    }



}
