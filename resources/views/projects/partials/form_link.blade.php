<div>
    <label for="link" class="font-bold text-xl mr-4">Link</label>
    @isset($value)
        <input type="text" id="link" name="link" placeholder="https://example.com/project" value="{{ $value }}">
    @else
        <input type="text" id="link" name="link" placeholder="https://example.com/project">
    @endisset
</div>
