@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-top: 10px">
                <a href="{{ route('drivers.create') }}" class="btn btn-primary active" role="button"
                   aria-pressed="true">Sukurti vairuotojo įrašą</a>
            </div>
            <table class="table thead-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Miestas</th>
                    <th scope="col">Užfiksuota kartų</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>


                @foreach($drivers as $driver)
                    <tr>
                        <td>{{$driver->id}}</td>
                        <td>{{$driver->name}}</td>
                        <td>{{$driver->city}}</td>
                        <td>{{count($driver->radars)}}</td>
                        <td><a href="{{route('drivers.show',$driver->id)}}" class="btn btn-info">Plačiau</a></td>
                        <td><a href="{{route('drivers.edit',$driver->id)}}" class="btn btn-success">Redaguoti</a></td>
                        <td>
                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $drivers->links() }}
        </div>
    </div>

@endsection
