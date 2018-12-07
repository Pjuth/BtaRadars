@extends('layout')

@section('content')
    <div class="container">
        <table class="table thead-dark" style=" width: 600px; text-align: center;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Vardas</th>
                <th scope="col">Miestas</th>
                <th scope="col">Užfiksuota kartų</th>

            </tr>
            </thead>
            <tbody>


            <tr>
                <td>{{$driver->id}}</td>
                <td>{{$driver->name}}</td>
                <td>{{$driver->city}}</td>
                <td>{{count($driver->radars)}}</td>

            </tr>

            </tbody>
        </table>

    </div>

@endsection
