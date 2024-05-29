<x-layout>

    <!-- named slot for title  -->
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>


    <div class="space-y-4">
        @foreach($jobs as $job)

            <a href="/jobs/{{ $job['id'] }}"
                class=" block px-4 py-6 border border-gray-300 rounded-lg ">
                <div class="font-bold text-blue-500">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <h1 class="text-xl font-bold">{{ $job['title'] }}</h1>
                    <br>
                    <h2 class="text-lg font-italic">
                        <em>Salary : {{ $job['salary'] }}</em>
                    </h2>
                    <p>
                        {{ $job->created_at->format('F d, Y h:i A') }}
                    </p>
                </div>

            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout>
