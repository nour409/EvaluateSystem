@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('course.updateDescription',$course)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control rounded-0" name="description"
                          rows="10">{{$course->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@stop
