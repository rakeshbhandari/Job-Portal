<x-layout>

    <!-- named slot for title  -->
    <x-slot:heading>
        Create Job
    </x-slot:heading>



    <form method="POST"
          action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create A New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Just a bitty bit of details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title"
                                          id="title"
                                          placeholder="Software developer"
                                          required>
                            </x-form-input>
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>


                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="description"
                                          id="description"
                                          placeholder="Full stack developer"
                                          required>
                            </x-form-input>
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary"
                                          id="salary"
                                          placeholder="$400000"
                                          required>
                            </x-form-input>
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>



                </div>


            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>


</x-layout>
