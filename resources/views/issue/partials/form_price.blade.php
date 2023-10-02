<div>
    <div class="col-span-1">
        <label for="price" class="font-bold text-xl mr-4">Price ($)</label>
    </div>
    @isset($value)
        <div class="col-span-4">
            <input type="number" min="0" step="0.01" id="price" name="price" required maxlength="255" class="dark:bg-gray-700" placeholder="Price in USD"
                value="{{ $value }}">
        </div>
    @else
        <div class="col-span-4">
            <input type="number" min="0" step="0.01" id="price" name="price" required maxlength="255" class="dark:bg-gray-700" placeholder="Price in USD" value="0.00">
        </div>
    @endisset
    @error('price')
        <div class="tex-red-500" class="col-span-4">{{ $message }}</div>
    @enderror
    
</div>