<div>
    <label for="description">Description</label>
    @isset($value)
        <textarea id="description" name="description">{{ $value }}</textarea>
    @else
        <textarea id="description" name="description"></textarea>
    @endisset
</div>
