<x-layout>

    <!-- named slot for title  -->
    <x-slot:heading>
        Login
    </x-slot:heading>



    <form method="POST"
          action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email"
                                          name="email"
                                          type="email"
                                          placeholder="Austinlilboy@gmail.com"
                                          required>
                            </x-form-input>
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password"
                                          name="password"
                                          type="password"
                                          required>
                            </x-form-input>
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>








                </div>


            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a class="text-sm font-semibold leading-6 text-gray-900"
               href=/"">Cancel</>
                <x-form-button>Register</x-form-button>
        </div>
    </form>


</x-layout>
