@extends('layout')

@section('content')
<div class="container">
    <table class="table thead-dark" style=" width: 250px; text-align: center;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pavadinimas</th>
        </tr>
        </thead>
        <tbody>


        @foreach($fuel_stations as $fuel_station)
            <tr>
                <td>{{$fuel_station->id}}</td>
                <td>{{$fuel_station->name}}</td>
                <td><a href="{{route('fuel_stations.show',$fuel_station->id)}}">Plačiau</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

@endsection
