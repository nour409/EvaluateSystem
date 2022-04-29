<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
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
    public function index()//show all courses the assign to doctor
    {

        return view('doctor.index')->with(['user' => auth()->user()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//admin add doctor
    {

        return view('doctor.create')->with(['user'=>auth()->user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//admin store doctor
    {
        user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'photo'=>'default_user.jpg',
            'role'=>1

        ]);
        return  redirect('doctor/');
    }
    public function allDoctors()//show all doctors for admin
    {
        $data =user::all()->where('role','1');

       return view('doctor.all',compact('data'))->with(['user'=>auth()->user()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//show specific doctor for admin
    {
        $data=user::find($id);
        return  view('doctor.show',compact('data'))->with(['user'=>auth()->user()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)//delete doctor by admin
    {
        $user->course()->detach();
        $user->delete();
        return redirect('doctor/all');
    }
}
