<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $car->name ?? '') }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
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
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ old('status', $car->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $car->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Cover Image</label>
        <input type="file" name="image" class="form-control">
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        @if (isset($car) && $car->image)
            <img src="{{ asset('storage/' . $car->image) }}" width="100" class="mt-2 border">
        @endif
        <img id="preview" src="#" style="max-width:150px;display:none" class="mt-2 border" />
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Gallery Images (Multiple)</label>
        <input type="file" name="gallery[]" class="form-control" multiple accept="image/*">
        @error('gallery.*')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div id="galleryPreview" class="d-flex flex-wrap gap-2 mt-2"></div>
    </div>

    @if (isset($car) && $car->images && $car->images->count())
        <div class="col-md-12 mb-3">
            <label class="form-label">Existing Gallery Images</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($car->images as $img)
                    <div class="position-relative border p-1" id="gallery-img-{{ $img->id }}">
                        <img src="{{ asset('storage/' . $img->image) }}" width="100">
                        <button
                            type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-gallery-img"
                            data-id="{{ $img->id }}"
                            data-url="{{ route('admin.cars.images.destroy', $img->id) }}"
                        >
                            &times;
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="col-md-12 mb-3">
        <label class="form-label">Details</label>
        <textarea name="details" id="editor">{{ old('details', $car->details ?? '') }}</textarea>
        @error('details')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>