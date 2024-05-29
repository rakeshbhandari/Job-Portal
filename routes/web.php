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
    $jobs = Job::with('employer')->latest()->paginate(10);

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
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'salary' => ['required', 'numeric'],
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    return redirect('/jobs');
});

//show job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});


//edit job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
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