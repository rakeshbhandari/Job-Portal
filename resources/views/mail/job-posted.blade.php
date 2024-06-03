{{-- $job object accessed here --}}
<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats {{ $job->employer->user->name }} ! You have posted a new job.
</p>

{{-- url will generate the full url --}}
<p>
    <a href={{
       url('/jobs/'
       .
       $job->id )}} ">View Your Job</a>
</p>
