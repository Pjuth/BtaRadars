<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\RadarsRequest;
use App\Radar;
use Illuminate\Http\Request;

class RadarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('radars/index', ['radars' => Radar::with('driver', 'user')->paginate(31)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RadarsRequest $request)
    {
        Radar::create([
            'date'     => $request->data,
            'number'   => $request->autoNr,
            'distance' => $request->atstumas,
            'time'     => $request->laikas,
            'user_id'  => auth()->id(),
        ]);

        return redirect(route('radars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Radar $radar
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Radar $radar)
    {
        return view('radars.show', ['radar' => $radar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Radar $radar
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Radar $radar)
    {
        return view('radars.edit', [
            'radar'   => $radar,
            'drivers' => Driver::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Radar               $radar
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RadarsRequest $request, Radar $radar)
    {
        $radar->date = $request->data;
        $radar->number = $request->autoNr;
        $radar->distance = $request->atstumas;
        $radar->time = $request->laikas;
        $radar->driver_id = $request->driver_id;
        $radar->user()->associate(auth()->id());
        $radar->save();

        return redirect(route('radars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Radar $radar
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Radar $radar)
    {
        $radar->user()->associate(auth()->id());
        $radar->save();
        $radar->delete();

        return redirect(route('radars.index'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTrash()
    {
        return view('radars/trash', ['radars' => Radar::with('user')->onlyTrashed()->paginate(10)]);
    }

    /**
     * @param Radar $radar
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function hardDestroy(Request $request)
    {
        Radar::onlyTrashed()->find($request->id)->forceDelete();

        return redirect(route('radars.showTrash'));
    }

    /**
     * @param Request $request
     *
     * @return bool|null
     */
    public function restore(Request $request)
    {
        $radar = Radar::onlyTrashed()->find($request->id);
        $radar->user()->associate(auth()->id());
        $radar->save();
        $radar->restore();

        return redirect(route('radars.showTrash'));
    }
}
