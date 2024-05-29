<?php

use App\Models\Job;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//home page
Route::get('/', function () {

    return view('home');
});

//contact page
Route::get('/contact', function () {
    return view('contact');
});


//index : all jobs 
Route::get('/jobs', function () {
    //get all jobs with their employers and order them by the latest created with pagination
    $jobs = Job::with('employer')->latest()->paginate(10);

    //return the view with the jobs
    return view(
        'jobs.index',
        ['jobs' => $jobs]
    );
});

//create new job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


//store new job
Route::post('/jobs', function (Request $request) {
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'salary' => ['required', 'numeric'],
    ]);

    //store
    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    //redirect
    return redirect('/jobs');
});

//show job
Route::get('/jobs/{id}', function ($id) {
    //find the job
    $job = Job::find($id);
    //return the view with the job
    return view('jobs.show', ['job' => $job]);
});


//edit job
Route::get('/jobs/{id}/edit', function ($id) {
    //find the job
    $job = Job::find($id);
    //return the create view with the job
    return view('jobs.edit', ['job' => $job]);
});


//update job
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'salary' => ['required', 'numeric'],
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        

    ]);

    
    return redirect('/jobs/' . $job->id);
});


//delete job
Route::delete('/jobs/{id}', function ($id) {


    //delete the job
    $job = Job::findOrFail($id);
    $job->delete();

    //redirect 
    return redirect('/jobs');
});