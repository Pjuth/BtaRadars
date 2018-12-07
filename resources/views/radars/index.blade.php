@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-top: 10px">
                <a href="{{ route('radars.create') }}" class="btn btn-primary active">{{__('versti.createRadar')}}</a>
                <a href="{{ route('radars.showTrash') }}" class="btn btn-primary active">{{__('versti.trash')}}</a>
            </div>
            <table class="table thead-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('versti.date')}}</th>
                    <th scope="col">{{__('versti.number')}}</th>
                    <th scope="col">{{__('versti.distance')}}</th>
                    <th scope="col">{{__('versti.time')}}</th>
                    <th scope="col">{{__('versti.speed')}}</th>
                    <th scope="col">{{__('versti.driverName')}}</th>
                    <th scope="col">{{__('versti.lastEdit')}}</th>
                    <th scope="col"></th>
                </tr>
                <div>
                    {{trans_choice('versti.showing', count($radars), ['count' => count($radars), 'radars' => $radars->total()])}}
                    {{--Showing {{count($radars)}} out of {{$radars->total()}}.--}}
                </div>
                </thead>
                <tbody>

                @foreach($radars as $radar)
                    <tr>
                        <td>{{$radar->id}}</td>
                        <td>{{$radar->date}}</td>
                        <td>{{$radar->number}}</td>
                        <td>{{$radar->distance}}</td>
                        <td>{{$radar->time}}</td>
                        <td>{{round($radar->distance / $radar->time *3.6, 1)}}</td>
                        <td>{{$radar->driver->name}}</td>
                        <td>{{$radar->user->name}}</td>
                        <td><a href="{{route('radars.show',$radar->id)}}" class="btn btn-info">{{__('versti.more')}}</a></td>
                        <td><a href="{{route('radars.edit',$radar->id)}}" class="btn btn-success">{{__('versti.edit')}}</a></td>
                        <td>
                            <form action="{{ route('radars.destroy', $radar->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">{{__('versti.delete')}}</button>
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
