<div class="flex my-4">
    <label for="description" class="font-bold text-xl mr-4">Description</label>
    @isset($value)
        <textarea id="description" name="description" class="w-screen h-32">{{ $value }}</textarea>
    @else
        <textarea id="description" name="description"></textarea>
    @endisset
</div>
