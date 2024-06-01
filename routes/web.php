<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;


//home page
// Route::get('/', function () {

//     return view('home');
// });
// Route::view does the same thing as the above code
// only applicable for static pages
Route::view('/', 'home');

//contact page
Route::view('/contact', 'contact');


//NOTE: JobController routes are grouped together
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
// NOTE: route resource for JobController which does the same thing as the above code
Route::resource('jobs', JobController::class);




//Auth routes

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
