<!DOCTYPE html>
<html lang="en"
      class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laravel</title>
</head>

<body class="h-full">
    <!--
		This example requires updating your template:

		```
		<html class="h-full bg-gray-100">
		<body class="h-full">
		```
-->
    <div class="min-h-full">
        <nav class="bg-gray-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8"
                                 src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                 alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- styling the current nav link with request()->is method -->
                                <x-nav-link href="/"
                                            :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/contact"
                                            :active="request()->is('contact')">Contact</x-nav-link>
                                <x-nav-link href="/jobs"
                                            :active="request()->is('jobs')"> Jobs </x-nav-link>

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @auth
                            <form action="/logout"
                                  method="POST">
                                @csrf
                                <x-form-button>
                                    Log Out
                                </x-form-button>
                            </form>
                            @endauth

                            @guest
                            <x-nav-link href="/login"
                                        :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register"
                                        :active="request()->is('register')">Register</x-nav-link>
                            @endguest





                        </div>
                    </div>

                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden"
                 id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/"
                       class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                       aria-current="page">Home</a>
                    <a href="/contact"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                    <a href="/jobs"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Jobs</a>

                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            @auth
                            <form action="/logout"
                                  method="POST">
                                @csrf
                                <x-form-button>
                                    Log Out
                                </x-form-button>
                            </form>
                            @endauth

                            @guest
                            <x-nav-link href="/login"
                                        :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register"
                                        :active="request()->is('register')">Register</x-nav-link>
                            @endguest
                        </div>



                        </button>
                    </div>

                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>


                <x-button href="/jobs/create">
                    Create Job
                </x-button>

            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>


</body>

</html>