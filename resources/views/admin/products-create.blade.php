@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div>
@endsection
