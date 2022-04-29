<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Actors\DoctorController;
//admin make this actions
Route::middleware(['Admin'])->group(function (){
    Route::get('doctor/all',[DoctorController::class,'allDoctors'])->name('doctor.all');
    Route::get('doctor/delete/{user}',[DoctorController::class,'destroy'])->name('doctor.delete');
});

Route::resource('doctor', 'Actors\DoctorController');
