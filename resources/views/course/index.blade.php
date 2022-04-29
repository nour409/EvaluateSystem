@extends('layout.master',['index'=>''])

@section('content')

    <div class="container-fluid">

        <div class="container pt-4">
            <h2>Dashboard</h2>
            <hr>
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-md-4 col-sm-12 ">
                        <a href="{{route('course.show',$item)}}" class="special-link">
                            <div class="card dashboard_card" style="width: 18rem;">
                                <img src="{{URL::asset('images/courses/'.$item->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                    @foreach($item->doctor as $i)
                                        <div class="profile_dashboard">
                                            <img src="{{URL::asset('images/users/'.$i->photo)}}">
                                            <div class="profile_name">{{$i->name}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





@stop
