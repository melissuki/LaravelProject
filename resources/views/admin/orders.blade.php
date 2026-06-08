@extends('layouts.admin')

@section('content')
    <h1>Customer Orders</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Order::all() as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
