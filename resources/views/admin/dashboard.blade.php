
@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome, Admin! You can manage your products and orders here.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 bg-primary text-white">
                <h5>Total Products</h5>
                <h2>{{ \App\Models\Product::count() }}</h2>
            </div>
        </div>
    </div>
@endsection
