<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all jobs with their employers and order them by the latest created with pagination
        $jobs = Job::with('employer')->latest()->paginate(10);

        //return the view with the jobs data
        return view(
            'jobs.index',
            ['jobs' => $jobs]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
            'salary' => ['required', 'numeric'],
        ]);

        //store
        $job =  Job::create([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        //send mail after job is posted
        Mail::to($job->employer->user)
            ->send(new JobPosted($job));

        //redirect
        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //find the job by id
        // NOTE: we can use the $job variable directly because of the route model binding
        // $job = Job::find($id);
        //return the view with the job
        return view(
            'jobs.show',
            ['job' => $job]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //find the job
        // NOTE: we can use the $job variable directly because of the route model binding
        // $job = Job::find($id);
        //return the create view with the job
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
            'salary' => ['required', 'numeric'],
        ]);

        // $job = Job::findOrFail($id);

        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //delete the job
        // $job = Job::findOrFail($id);
        $job->delete();

        //redirect
        return redirect('/jobs');
    }
}
