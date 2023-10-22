<?php

namespace App\Http\Controllers;

use App\Models\PlantingPlanning;
use Illuminate\Http\Request;

class PlantingPlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('planting-planning.index');
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
    public function show(PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantingPlanning $plantingPlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantingPlanning $plantingPlanning)
    {
        //
    }
}
