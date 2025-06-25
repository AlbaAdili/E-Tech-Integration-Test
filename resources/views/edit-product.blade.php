@extends("layouts/master")

@section("title","Edit Product")

@section("content")
    <div>
        <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" class="form" enctype="multipart/form-data">
            @csrf 
            {{ method_field('PUT') }}
            <div class="form-content">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" placeholder="Enter Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-content">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" placeholder="Enter Price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-content">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" placeholder="Enter Quantity">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-content">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" onchange="updateFileName(); updateImagePreview();">
                <br>
                <button type="button" class="btn button-primary" onclick="document.getElementById('image').click()">Choose File</button>
                <span id="selectedFileName"></span>
                <br>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" id="imagePreview" alt="{{ $product->name }} Image" style="max-width: 300px; border-top: 1px solid #0c6efd; border-bottom: 1px solid #0c6efd; margin-top: 2em;">
                @else
                    <img src="" id="imagePreview" alt="Image Preview" class="mt-2" style="max-width: 300px; display: none;">
                @endif
            </div>
            <div class="form-content">
                <button type="submit" class="btn button-secondary mt-2">Update Product</button>
            </div>
        </form>
    </div>
@endsection