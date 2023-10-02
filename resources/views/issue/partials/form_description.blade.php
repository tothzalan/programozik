<div>
    <div class="col-span-1">
        <label for="description" class="font-bold text-xl mr-4">Description</label>
    </div>
    @isset($value)
        <div class="col-span-4">
            <textarea id="description" name="description" class="w-full h-32 dark:bg-gray-700">{{ $value }}</textarea>
        </div>
    @else
        <div class="col-span-4">
            <textarea id="description" name="description" class="w-full dark:bg-gray-700" placeholder="What is this issue about?"></textarea>
        </div>
    @endisset
    @error('description')
        <div class="tex-red-500" class="col-span-4">{{ $message }}</div>
    @enderror
</div>