<div class="">
    <div class="col-span-1">
        <label for="url" class="font-bold text-xl mr-4">URL</label>
    </div>
    @isset($value)
        <div class="col-span-4">
            <input type="text" id="url" name="url" required maxlength="255" class="dark:bg-gray-700" placeholder="URL for issue"
                value="{{ $value }}">
        </div>
    @else
        <div class="col-span-4">
            <input type="text" id="url" name="url" required maxlength="255" class="dark:bg-gray-700" placeholder="URL for issue">
        </div>
    @endisset
    @error('url')
        <div class="tex-red-500" class="col-span-4">{{ $message }}</div>
    @enderror
    
</div>