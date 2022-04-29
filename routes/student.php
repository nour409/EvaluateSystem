<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Actors\StudentController;

Route::middleware(['Student'])->group(function (){
    Route::get('student',[StudentController::class,'index'])->name('student.index');
    Route::get('student/chooseCourse',[CourseController::class,'chooseCourse'])->name('course.choose_course');
    Route::get('student/searchCourse/{search}',[CourseController::class,'searchCourse'])->name('course.searchCourse');
    Route::get('student/showCourse/{course}',[CourseController::class,'showCourse'])->name('course.showCourse');
    Route::get('student/addCourseToStudent/{course}',[CourseController::class,'addCourseToStudent'])->name('course.addCourseToStudent');
    Route::get('student/deleteCourseToStudent/{course}',[CourseController::class,'deleteCourseToStudent'])->name('course.deleteCourseToStudent');


});
//admin make this actions
Route::middleware(['Admin'])->group(function (){
    Route::get('student/all_student',[StudentController::class,'allStudent'])->name('student.allStudent');
    Route::get('student/{data}',[StudentController::class,'show'])->name('student.show');
    Route::get('student/delete/{data}',[StudentController::class,'destroy'])->name('student.delete');
});

//student make this actions

Route::get('student/quizzes/{course}',[CourseController::class,'showQuiz'])->name('course.showQuizzes');//show all quizzes for specific course



