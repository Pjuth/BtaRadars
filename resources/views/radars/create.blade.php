@extends('layout')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Greičio fiksavimas</h2>
        <form action="{{ route('radars.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="data">Data ir laikas:</label>
                <input type="datetime-local" class="form-control" id="data" value="{{ (old('data') ? old('data') : '2017-06-01T08:30') }}" name="data"
                       required>
            </div>
            <div class="form-group">
                <label for="autoNr">Automobilio numeris:</label>
                <input type="text" class="form-control" id="autoNr" name="autoNr" maxlength="6" value="{{ old('autoNr') }}" required>
            </div>
            <div class="form-group">
                <label for="atstumas">Nuvažiuotas atstumas (metrais):</label>
                <input type="number" class="form-control" id="atstumas" name="atstumas" value="{{ old('atstumas') }}" required>
            </div>
            <div class="form-group">
                <label for="laikas">Sugaištas laikas (sekundėmis):</label>
                <input type="number" class="form-control" id="laikas" name="laikas" value="{{ old('laikas') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Siųsti</button>
    </div>
    @foreach($errors->all() as $error)
        <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
    @endforeach
</div>

@endsection
