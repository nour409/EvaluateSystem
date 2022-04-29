@extends('layout.master2',['subject'=>"$course->name / ",'branch'=>'show ','sub_branch'=>'','activeCourse'=>'active'])

@section('content')
    <div class="container-fluid subject">
        <div class="buttons d-flex flex-row-reverse">
            <a class="add">
                <h4 class="d-inline">Add Doctor And Update In Course</h4>
                <i class="fa-solid fa-square-plus text-primary"></i>
            </a>
            <a class="delete" href="{{route('course.delete',$course)}}">

                <h4 class="text-danger d-inline">
                    delete
                </h4>
                <i class="fa-solid fa-trash text-danger"></i>
            </a>
        </div>

        <div class="head_subject">

            <img src="{{URL::asset('images/courses/'.$course->photo)}}" class="subject_img">
            <form class="edit_icon" id="form_courseImg" method="post" action="{{route('course.updatePhoto',$course)}}"
                  enctype="multipart/form-data">
                @csrf
                <label for="editPhotoCourse">
                    <i class="fa-solid fa-pen-to-square"></i>
                </label>
                <input type="file" id="editPhotoCourse" name="photo" onchange="submitForm()">

            </form>
        </div>

        <div class="row content_subject">
            <div class="col-lg-6 description">
                <h3>description <a class="edit_icon" href="{{route('course.editDescription',$course)}}">
                        <i class="fa-solid fa-pen"></i></a></h3>
                <p>{{$course->description}}.</p>
            </div>
            <div class="col-lg-6 announcement">
                <h3>announcement <a class="edit_icon" href="{{route('course.editAnnouncement',$course)}}">
                        <i class="fa-solid fa-pen"></i></a></h3>
                <p>{{$course->announce}}</p>
            </div>
        </div>
    </div>
@stop
