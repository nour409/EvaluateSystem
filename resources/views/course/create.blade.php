@extends('layout.master',['addCourse'=>''])
@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{route('course.store')}}" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" name="name" id="course_name" aria-describedby="emailHelp"
                       placeholder="name course">

            </div>
            <div class="form-group">
                <label for="description_course">description</label>
                <input type="text" class="form-control" name="description" id="description_course"
                       placeholder="description">
            </div>
            <div class="form-group">
                <label for="creditHours_course">credit hours</label>
                <input type="text" class="form-control" name="creditHours" id="creditHours_course"
                       placeholder="credit hours">
            </div>
            <div class="form-group">
                <label for="announce_course">announce</label>
                <input type="text" class="form-control" name="announce" id="announce_course" placeholder="announce">
            </div>
            <div class="form-group">
                <label for="photo_course">photo</label>
                <input type="file" class="form-control" name="photo" id="photo_course" placeholder="photo">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop
