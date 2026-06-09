@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2>Edit Product</h2>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
