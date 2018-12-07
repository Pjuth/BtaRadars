@extends('layout')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Redaguoti radarą</h2>
{{--            {{dd(auth()->id())}}--}}
            <form action="{{ route('radars.update', $radar->id) }}" method="post" autocomplete="off">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="data">Data ir laikas:</label>
                    <input type="datetime-local" class="form-control" id="data"
                           {{--value="{{ (old('data') ? old('data') : '2017-06-01T08:30') }}"--}}
                           value="{{(old('data') ? old('data') : date('Y-m-d\TH:i:s', strtotime($radar->date)))}}" name="data">
                </div>
                <div class="form-group">
                    <label for="autoNr">Automobilio numeris:</label>
                    <input type="text" class="form-control" id="autoNr" name="autoNr" maxlength="6"
                           value="{{ (old('autoNr') ? old('autoNr') : $radar->number) }}">
                </div>
                <div class="form-group">
                    <label for="atstumas">Nuvažiuotas atstumas (metrais):</label>
                    <input type="number" class="form-control" id="atstumas" name="atstumas"
                           value="{{ (old('atstumas') ? old('atstumas') : $radar->distance) }}">
                </div>
                <div class="form-group">
                    <label for="laikas">Sugaištas laikas (sekundėmis):</label>
                    <input type="number" class="form-control" id="laikas" name="laikas" value="{{ (old('laikas') ? old('laikas') : $radar->time) }}">
                </div>
                <div class="form-group">
                    <label for="driver_id">Vairuotojo ID:</label>
                    <select id="driver_id" name="driver_id" class="form-control">
                        <option value=""></option>
                        @foreach($drivers as $driver)
                            <option {{old('driver_id') ? ($driver->id == old('driver_id') ? 'selected="selected"' : '') : ($radar->driver_id == $driver->id ? 'selected="selected"' : '')}} value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti</button>
        </div>
        @foreach($errors->all() as $error)
            <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
        @endforeach

    </div>

@endsection