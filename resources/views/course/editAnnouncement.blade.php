@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('course.updateAnnouncement',$course)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Announcement</label>
                <textarea class="form-control rounded-0" name="announce" rows="10">{{$course->announce}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@stop
