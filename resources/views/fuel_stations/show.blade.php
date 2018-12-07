@extends('layout')

@section('content')
<div>
    <table class="table thead-dark" style=" width: 250px; text-align: center;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pavadinimas</th>
        </tr>
        </thead>
        <tbody>


            <tr>
                <td>{{$fuelStation->id}}</td>
                <td>{{$fuelStation->name}}</td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
