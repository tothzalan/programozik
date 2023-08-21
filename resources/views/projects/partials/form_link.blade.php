<div class="col-span-1">
    <label for="link" class="font-bold text-xl mr-4">Link</label>
</div>
@isset($value)
    <div class="col-span-4">
        <input type="text" id="link" name="link" placeholder="https://example.com/project"
            value="{{ $value }}">
    </div>
@else
    <div class="col-span-4">
        <input type="text" id="link" name="link" placeholder="https://example.com/project">
    </div>
@endisset
