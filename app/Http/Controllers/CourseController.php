<?php

namespace App\Http\Controllers;

use App\Http\traits\ImageSave;
use App\Models\course;
use App\Models\user;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ImageSave;//this treat I use it to upload image by function upload

    public function index()//show all courses to admin and doctor
    {
        $data = course::all();
        return view('course.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//create course by doctor and the admin
    {

        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//this store course data get by form
    {


        $fileName = $this->uploadPhoto($request->photo, 'images\courses');
        course::create([
            'name' => $request->name,
            'photo' => $fileName,
            'announce' => $request->announce,
            'description' => $request->description,
            'credit_hours' => $request->creditHours
        ]);
        return redirect('course');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\course $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)//doctor and admin can show course
    {

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editAnnouncement(course $course)//doctor and admin get edit  announcement form in course
    {
        return view('course.editAnnouncement', compact('course'));
    }

    public function editDescription(course $course)//doctor and admin get edit form  description course
    {
        return view('course.editDescription', compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function updateDescription(Request $request, Course $course)//get data from form and update it
    {
        $course->description = $request->description;
        $course->update();
        return view('course.show', compact('course'));
    }

    public function updateAnnouncement(Request $request, Course $course)//get data from form and update it
    {
        $course->announce = $request->announce;
        $course->update();

        return view('course.show', compact('course'));
    }

    public function updatePhoto(Request $request, Course $course)//update photo course from doctor and admin
    {
        $fileName = $this->uploadPhoto($request->photo, 'images/courses');
        $course->photo = $fileName;
        $course->update();

        return redirect('course/' . $course->id);
    }
    /*---------------------------------------------for student -------------------------------------------------*/

    public function chooseCourse()//thi show all courses to student
    {
        $data = Course::all();

        return view('course.chooseCourse', compact('data'))->with(['user' => auth()->user()]);


    }

    public function searchCourse()//search from student course
    {
        $search = $_GET['search'];

        $data = Course::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('course.chooseCourse', compact('data'));
    }

    public function showCourse(Course $course)//student can show course
    {

        $add = false;
        $find = user::with(['course' => function ($q) use ($course) {
            $q->where('course_id', '=', $course->id);
        }])->find(auth()->user()->id);

        count($find->course) == 0 ? $add = false : $add = true;

        return view('course.showCourse', compact('course'))->with(['add' => $add]);

    }

    public function addCourseToStudent(Course $course)//student add course to him self
    {
        $id = auth()->user()->id;
        $user = user::find($id);
        $user->course()->attach($course);


        return redirect('student/choose_course');
    }

    public function deleteCourseToStudent(Course $course)//student delete course from himself
    {
        $id = auth()->user()->id;
        $user = user::find($id);
        $user->course()->detach($course);

        return redirect('student/');
    }

    public function showQuiz(Course $course)//show all quizzes for specific course
    {

       // return $course;
    return view('quiz.index',compact('course'));
    }

    public function addAndUpdateDoctorToCourse(course $course)
    {

    }

    public function storeAndUpdateDoctorToCourse(Request $request, course $course)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('course');
    }
}
