<?php

namespace App\Http\Controllers;

use App\Models\Comodity;
use Illuminate\Http\Request;

class ComodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function ups() : Returntype {
        $komoditas = [
            [
                'name' => 'KACANG TANAH',
                'latin' => 'Arachis hypogaea L.',
                'temp' => '28 - 32°C',
                'ph' => '6-6.5',
                'planting_distance' => '40×20 cm',
                'fertilizer_dose' => 'pupuk Urea (100 kg/ha), SP-36 (200 kg/ha), KCl (100 kg/ha)',
                'potential_results' => 'Isi potensi hasil untuk KACANG TANAH di sini',
            ],
            [
                'name' => 'JAGUNG MANIS',
                'latin' => 'Zea mays saccharata Sturt',
                'temp' => '23-27 °C',
                'ph' => '5.5-7.0',
                'planting_distance' => '75×20 cm',
                'fertilizer_dose' => 'pupuk Urea (200 kg/ha), SP-36 (200 kg/ha), KCl (100 kg/ha)',
                'potential_results' => 'Isi potensi hasil untuk JAGUNG MANIS di sini',
            ],
            [
                'name' => 'KANGKUNG',
                'latin' => 'Ipomoea reptans',
                'temp' => '25–30 °C',
                'ph' => '5.5-6.5',
                'planting_distance' => '20×10 cm',
                'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
                'potential_results' => 'Isi potensi hasil untuk KANGKUNG di sini',
            ],
            [
                'name' => 'BAYAM',
                'latin' => 'Amaranthus sp',
                'temp' => '16-20 °C',
                'ph' => '6-7',
                'planting_distance' => '20',
                'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
                'potential_results' => 'Isi potensi hasil untuk BAYAM di sini',
            ],
            [
                'name' => 'KACANG PANJANG',
                'latin' => 'Vigna sinensis var. Sesquipedalis',
                'temp' => '20-35°C',
                'ph' => 'Isi pH yang sesuai',
                'planting_distance' => '50×50 cm',
                'fertilizer_dose' => '150 kg Urea, 100 kg SP-36, dan 100 kg KCL',
                'potential_results' => 'Isi potensi hasil untuk KACANG PANJANG di sini',
            ],
            [
                'name' => 'CABAI',
                'latin' => 'Capsicum annuum L',
                'temp' => '25-35 °C',
                'ph' => '6-7',
                'planting_distance' => '50×50 cm',
                'fertilizer_dose' => '200 kg Urea, 200 kg SP-36, dan 200 kg KCL',
                'potential_results' => 'Isi potensi hasil untuk CABAI di sini',
            ],
        ];

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comodity $comodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comodity $comodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comodity $comodity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comodity $comodity)
    {
        //
    }
}
