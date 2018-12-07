<?php

namespace App\Http\Controllers;

use App\FuelStation;
use Illuminate\Http\Request;

class FuelStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fuel_stations/index', ['fuel_stations' => FuelStation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FuelStation  $fuelStation
     * @return \Illuminate\Http\Response
     */
    public function show(FuelStation $fuelStation)
    {
        return view('fuel_stations/show', ['fuelStation' => $fuelStation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FuelStation  $fuelStation
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelStation $fuelStation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FuelStation  $fuelStation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelStation $fuelStation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FuelStation  $fuelStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuelStation $fuelStation)
    {
        //
    }
}
