<div>
    <label for="name">Name</label>
    @isset($value)
        <input type="text" id="name" name="name" required maxlength="255" placeholder="Name of the project"
               value="{{ $value }}">
    @else
        <input type="text" id="name" name="name" required maxlength="255" placeholder="Name of the project">
    @endisset
    @error('name')
    <div class="tex-red-500">{{ $message }}</div>
    @enderror
</div>
