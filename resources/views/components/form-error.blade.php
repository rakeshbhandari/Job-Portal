
@props(['name'])

@error($name)
    <p class="mt-1 text-red-500 text-xs font-semibold">{{ $message }}</p>
@enderror
