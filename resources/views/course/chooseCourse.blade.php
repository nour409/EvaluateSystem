@extends('layout.master')

@section('content')



    <div class="container pt-4">
        <div class="head_dashboard d-flex align-items-center justify-content-between">
            <h2>Choose Your Courses</h2>
            <form class="input-group rounded search_input  " id="form_search_course"
                  action="{{url('course/searchCourse/')}}" type="get">

                <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                       aria-describedby="search-addon" id="search_course"/>
                <label class="input-group-text border-0" id="search-addon" for="search_course"
                       onclick="submitSearchCourseForm()">
                    <i class="fas fa-search"></i>
                </label>

            </form>
        </div>

        <hr>
        <div class="row">
            @foreach ($data as $item)
                <div class="col-lg-4 col-md-4 col-sm-12 ">
                    <a href="{{route('course.showCourse',['course'=>$item])}}" class="special-link">
                        <div class="card dashboard_card" style="width: 18rem;">
                            <img src="{{URL::asset('images/courses/'.$item->photo)}}" class="card-img-top"
                                 alt="...">
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






@stop
