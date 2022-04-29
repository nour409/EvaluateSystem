<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role=='0')
        {
            return redirect()->route('student.index');
        }
        elseif (auth()->user()->role=='1')
        {
            return redirect()->route('doctor.index');
        }
        return redirect()->route('course.index');

    }
}
