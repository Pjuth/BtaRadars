@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-top: 10px">
            </div>
            <table class="table thead-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valst. Nr.</th>
                    <th scope="col">Kelias (m)</th>
                    <th scope="col">Laikas (s)</th>
                    <th scope="col">Greitis (km/h)</th>
                    <th scope="col">Vairuotojo vardas</th>
                    <th scope="col">Ištrynė</th>


                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($radars as $radar)
                    <tr>
                        <td>{{$radar->id}}</td>
                        <td>{{$radar->date}}</td>
                        <td>{{$radar->number}}</td>
                        <td>{{$radar->distance}}</td>
                        <td>{{$radar->time}}</td>
                        <td>{{ round($radar->distance / $radar->time *3.6, 1 )}}</td>
                        <td>{{$radar->driver->name}}</td>
                        <td>{{$radar->user->name}}</td>
                        <td>
                            <form action="{{ route('radars.restore', ['id' => $radar->id]) }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <button class="btn btn-primary" type="submit">Restore</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('radars.hardDestroy', ['id' => $radar->id]) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div>
                {{ $radars->links() }}
            </div>
        </div>

    </div>
@endsection
