@extends('layout.master',['index'=>''])
@section('content')
    <div class="container-fluid">

        <div class="container pt-4">
            <h2>Your courses</h2>
            <hr>
            <div class="row">
                @if(count($data->course)>0)
                @foreach ($data->course as $item)

                    <div class="col-lg-4 col-md-4 col-sm-12 ">
                        <a href="{{route('course.showCourse',$item)}}" class="special-link">
                            <div class="card dashboard_card" style="width: 18rem;">
                                <img src="{{'images/courses/'.$item->photo}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                    @foreach($item->doctor as $i)
                                        <div class="profile_dashboard">
                                            <img src="{{'images/users/'.$i->photo}}">
                                            <div class="profile_name">{{$i->name}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                    <div class="alert alert-primary" >
                        you do not have courses add Your courses
                    </div>
                @endif

            </div>
            <div class="row  d-flex justify-content-center">
                <a class="btn btn-primary w-25" href="{{route('course.choose_course')}}">
                    Add Your Courses
                </a>
            </div>

        </div>

    </div>

@stop
