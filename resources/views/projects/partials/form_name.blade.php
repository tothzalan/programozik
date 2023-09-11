<div class="col-span-1">
    <label for="name" class="font-bold text-xl mr-4">Name</label>
</div>
@isset($value)
    <div class="col-span-4">
        <input type="text" id="name" name="name" required maxlength="255" class="dark:bg-gray-700" placeholder="Name of the project"
            value="{{ $value }}">
    </div>
@else
    <div class="col-span-4">
        <input type="text" id="name" name="name" required maxlength="255" class="dark:bg-gray-700" placeholder="Name of the project">
    </div>
@endisset
@error('name')
    <div class="tex-red-500" class="col-span-4">{{ $message }}</div>
@enderror
