<div>
    <label for="link">Link</label>
    @isset($value)
        <input type="text" id="link" name="link" placeholder="https://example.com/project" value="{{ $value }}">
    @else
        <input type="text" id="link" name="link" placeholder="https://example.com/project">
    @endisset
</div>
