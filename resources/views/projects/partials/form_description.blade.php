<div class="col-span-1">
    <label for="description" class="font-bold text-xl mr-4">Description</label>
</div>
@isset($value)
    <div class="col-span-4">
        <textarea id="description" name="description" class="w-full h-32">{{ $value }}</textarea>
    </div>
@else
    <div class="col-span-4">
        <textarea id="description" name="description" class="w-full h-32"></textarea>
    </div>
@endisset
