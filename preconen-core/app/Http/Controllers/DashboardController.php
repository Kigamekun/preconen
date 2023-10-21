<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $price = [
            'JPK'=>['nama'=>'JPK','harga'=>12000],
            'GKP'=>['nama'=>'GKP','harga'=>7000],
            'CMB'=>['nama'=>'CMB','harga'=>9000],
            'CMK'=>['nama'=>'CMK','harga'=>4000],
        ];

        return view('dashboard',['price'=>$price]);
    }
}
