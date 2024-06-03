<x-layout>

    <!-- named slot for title  -->
    <x-slot:heading>
        Job
    </x-slot:heading>


    <h2>
        {{ $job->title }}
    </h2>

    <p>
        Description: {{ $job->description }}
    </p>

    <p>
        Salary: {{ $job->salary }}
    </p>

    @can('edit', $job)
    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job

        </x-button>
    </p>
    @endcan

</x-layout>
