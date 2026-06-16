<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>

        <input type="text" name="name" class="form-control" value="{{ old('name', $car->name ?? '') }}">

        @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Brand</label>

        <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Color</label>

        <input type="text" name="color" class="form-control" value="{{ old('color', $car->color ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Size</label>

        <input type="text" name="size" class="form-control" value="{{ old('size', $car->size ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Price</label>

        <input type="number" step="0.01" name="price" class="form-control"
            value="{{ old('price', $car->price ?? '') }}">

        @error('price')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Image</label>

        <input type="file" name="image" class="form-control">

        @if (isset($car) && $car->image)
            <img src="{{ asset('storage/' . $car->image) }}" width="100" class="mt-2 border">
        @endif
    </div>

    <img id="preview" src="#" style="max-width:150px;display:none" class="mt-2" />

    <div class="col-md-12 mb-3">

        <label class="form-label">
            Details
        </label>

        <textarea name="details" rows="5" class="form-control">{{ old('details', $car->details ?? '') }}</textarea>

        @error('details')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

    </div>

</div>
