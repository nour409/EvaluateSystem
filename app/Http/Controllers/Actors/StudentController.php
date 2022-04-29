<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\user;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//show the index page for student all courses student choose it
    {
        $id = auth()->user()->id;

        $data = user::find($id);


        return view('student.index', compact('data'))->with(['user' => auth()->user()]);

    }

//    public function chooseCourse()
//    {
//        $data = course::all();
//        return view('student.chooseCourse', compact('data'))->with(['user' => auth()->user()]);
//
//
//    }


    public function allStudent()//show all students for admin and doctor
    {
        $data =user::all()->where('role','0');
        return view('student.all_student', compact('data'));
    }
    public function show(user $data)//show specific student by admin
    {
       // $data=user::find($id);
//return$data->course;
        return view('student.show',compact('data'))->with(['user'=>auth()->user()]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $data)
    {
        $data->course()->detach();
        $data->delete();
        return redirect('student/all_student');
    }
}
