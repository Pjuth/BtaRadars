@extends('layout')

@section('title', 'Create Driver')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Greičio fiksavimas</h2>
        <form action="{{ route('drivers.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="name">Vardas ir pavardė:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="city">Miestas:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <button type="submit" class="btn btn-primary">Siųsti</button>
    </div>
</div>

@endsection
