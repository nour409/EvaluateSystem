<?php


use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

//Doctor and admin make this actions
Route::middleware(['AdminAndDoctor'])->group(function (){
    Route::get('course/editAnnouncement/{course}',[CourseController::class,'editAnnouncement'])->name('course.editAnnouncement');
    Route::get('course/editDescription/{course}',[CourseController::class,'editDescription'])->name('course.editDescription');
    Route::get('course/delete/{course}',[CourseController::class,'destroy'])->name('course.delete');
    Route::post('course/editAnnouncement/{course}',[CourseController::class,'updateAnnouncement'])->name('course.updateAnnouncement');
    Route::post('course/editDescription/{course}',[CourseController::class,'updateDescription'])->name('course.updateDescription');
    Route::post('course/updatephoto/{course}',[CourseController::class,'updatePhoto'])->name('course.updatePhoto');

    Route::get('course/addUpdateDoctorCourse/{course}',[CourseController::class,'addAndUpdateDoctorToCourse'])->name('course.addUpdateDoctorCourse');
    Route::post('course/storeUpdateDoctorCourse/{course}',[CourseController::class,'storeAndUpdateDoctorToCourse'])->name('course.storeUpdateDoctorCourse');
    Route::resource('course', 'CourseController');
});

//Doctor and admin make this actions

