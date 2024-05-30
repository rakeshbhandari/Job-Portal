<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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
