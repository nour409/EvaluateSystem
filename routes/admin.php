<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Actors\AdminController;


Route::resource('admin', 'Actors\AdminController');

