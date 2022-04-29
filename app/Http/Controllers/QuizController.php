<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\user;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//,course $course
    {
        $quiz = Quiz::create([
            'name' => $request->quizName,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'number_clock' => $request->clock,
            'course_id' => 1
        ]);
        $i = 0;//this variable for index in option in question
        foreach ($request->question as $q) {
            $question = Question::create([
                'body' => $q,
                'quiz_id' => $quiz->id
            ]);


            if ($request->choose1[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose1[$i],
                    'point' => 1 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose2[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose2[$i],
                    'point' => 2 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose3[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose3[$i],
                    'point' => 3 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose4[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose4[$i],
                    'point' => 4 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose5[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose5[$i],
                    'point' => 5 == substr($request->answer[$i], -1) ? 1 : 0

                ]);

            $i++;

        }

        return "success";
    }

    public function quizView($id)
    {
        $quiz = Quiz::with(['Question' => function ($query) {
            $query->inRandomOrder()->with(['Option' => function ($q) {
                $q->inRandomOrder();
            }]);
        }])->find($id);


        return view('quiz.exam', compact('quiz'));


    }

    public function result(Request $request, $id)
    {


        $option = Option::find($request->questions);


        auth()->user()->quiz()->attach($id, array('grade' => $option->sum('point'), 'attendance' => true));
        return "success";

    }

    public function gradesForQuize(Quiz $quiz)
    {
        return view('quiz.grades', compact('quiz'));

    }

    public function gradesForUser()
    {
        return view('student.grade');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
