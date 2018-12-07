@extends('layout')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Redaguoti vairuotoją</h2>
        <form action="{{ route('drivers.update', $driver->id) }}" method="post" autocomplete="off">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Vardas ir Pavardė:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $driver->name }}" required>
            </div>
            <div class="form-group">
                <label for="city">Miestas:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $driver->city }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </div>
    @foreach($errors->all() as $error)
        <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
    @endforeach

</div>

@endsection
