@extends('layout.master2',['subject'=>"$course->name / ",'branch'=>'show ','sub_branch'=>'','activeCourse'=>'active'])

@section('content')

    <div class="container-fluid subject">
        <div class="buttons d-flex flex-row-reverse">
            @if(!$add)


            <a class="add" href="{{route('course.addCourseToStudent',$course)}}"  >
                <h4 class="d-inline">add course</h4>
                <i class="fa-solid fa-square-plus text-primary"></i>
            </a>
            @else
            <a class="delete" href="{{route('course.deleteCourseToStudent',$course)}}">

                <h4 class="text-danger d-inline">
                    delete
                </h4>
                <i class="fa-solid fa-trash text-danger"></i>
            </a>
            @endif
        </div>

        <div class="head_subject">

            <img src="{{URL::asset('images/courses/'.$course->photo)}}" class="subject_img">

        </div>

        <div class="row content_subject">
            <div class="col-lg-6 description">
                <h3>description</h3>
                <p>{{$course->description}}.</p>
            </div>
            <div class="col-lg-6 announcement">
                <h3>announcement </h3>
                <p>{{$course->announce}}</p>
            </div>
        </div>
    </div>
@stop
