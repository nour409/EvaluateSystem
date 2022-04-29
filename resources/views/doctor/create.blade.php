@extends('layout.master',['head_bar'=>1,'subject'=>"Add Doctor ",'branch'=>'','sub_branch'=>'','addDoctor'=>''])
@section('content')
    <div class="container">
        <form action="{{route('doctor.store')}}" method="post" class="d-flex flex-column p-5 add_doctor" >
            @csrf
            <h4>Add Doctor</h4>
            <input type="text" name="name" placeholder="  Enter Name">
            <input type="email" name="email" placeholder="  Enter Email">
            <input type="text" name="username" placeholder="  Enter Username">
            <input type="password" name="password" placeholder="  Enter Password">
            <button class="btn btn-primary">submit</button>

        </form>
    </div>
@stop
