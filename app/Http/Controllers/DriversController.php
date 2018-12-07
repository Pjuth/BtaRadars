<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriversRequest;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drivers/index', ['drivers' => Driver::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriversRequest $request)
    {
        Driver::create([
            'name'     => $request->name,
            'city'   => $request->city,
        ]);

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', ['driver' => $driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit', ['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(DriversRequest $request, Driver $driver)
    {
        $driver->name = $request->name;
        $driver->city = $request->city;
        $driver->save();
        return redirect('drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver $driver
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect(route('drivers.index'));
    }
}
