@extends('layout')

@section('content')
    <div class="container">
        <table class="table thead-dark" style=" width: 800px; text-align: center;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Data</th>
                <th scope="col">Valst. Nr.</th>
                <th scope="col">Kelias (m)</th>
                <th scope="col">Laikas (s)</th>
                <th scope="col">Greitis (km/h)</th>
                @if($radar->driver_id)
                    <th scope="col">Vairuotojas</th>
                @endif
            </tr>
            </thead>
            <tbody>


            <tr>
                <td>{{$radar->id}}</td>
                <td>{{$radar->date}}</td>
                <td>{{$radar->number}}</td>
                <td>{{$radar->distance}}</td>
                <td>{{$radar->time}}</td>
                <td>{{round($radar->distance / $radar->time *3.6, 1)}} km/h</td>
                @if($radar->driver_id)
                    <td>{{$radar->driver->name}}</td>
                @endif
            </tr>

            </tbody>
        </table>

    </div>

@endsection
