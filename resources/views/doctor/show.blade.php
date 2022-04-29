@extends('layout.master',['head_bar'=>1,'subject'=>"all Doctors / ",'branch'=>$data->name,'sub_branch'=>''])

@section('content')
    <div class="container-fluid show_student">
        <div class="row  head_student">
            <div class="buttons d-flex flex-row-reverse">
                <a class="delete" href="{{route('doctor.delete',$data)}}">

                    <h4 class="text-danger d-inline">
                        delete
                    </h4>
                    <i class="fa-solid fa-trash text-danger"></i>
                </a>
            </div>

            <div class="col-lg-4">
                <img src="{{URL::asset('images/users/'.$data->photo)}}">
            </div>
            <div class="col-lg-8">
                <div class="data">
                    <h2>{{$data->name}}</h2>
                    <h4>
                        Username:{{$data->username}}
                    </h4>

                </div>
            </div>


        </div>
        <div class="row student_courses">
            <h4 class="text-center">Courses</h4>
            @if(count($data->course))
                @foreach($data->course as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{route('student.showCourse',['course'=>$item])}}" class="special-link">
                            <div class="card dashboard_card" style="width: 18rem;">
                                <img src="{{URL::asset('images/courses/'.$item->photo)}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                    @foreach($item->doctor as $i)
                                        <div class="profile_dashboard">
                                            <img src="{{URL::asset('images/courses/'.$i->photo)}}">
                                            <div class="profile_name">{{$i->name}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="alert alert-primary w-75 m-auto mt-4">do not have any courses</div>
            @endif
        </div>


    </div>
@stop
