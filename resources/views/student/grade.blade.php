@extends('layout.master',['grades'=>''])
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">quiz</th>
            <th scope="col">grade</th>

        </tr>
        </thead>
        <?php $i=1?>
        <tbody>
        @foreach(auth()->user()->quiz as $item)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$item->course->name.' '.$item->name}}</td>
                <td>{{$item->pivot->grade}}</td>

            </tr>
            <?php $i++;?>
        @endforeach
        </tbody>
    </table>
@stop
