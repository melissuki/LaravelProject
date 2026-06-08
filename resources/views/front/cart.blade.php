
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Your Cart - TechShop</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">TechShop</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Back to Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Your Shopping Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($cart))
            <div class="alert alert-info">
                Your cart is currently empty.
            </div>
            <a href="/" class="btn btn-dark">Start Shopping</a>
        @else
            <ul class="list-group mb-4">
                @foreach($cart as $id => $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-muted">${{ number_format($item['price'], 2) }}</small>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST" class="m-0">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="btn btn-dark">Keep Shopping</a>

                <form action="{{ route('checkout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">Checkout</button>
                </form>
            </div>
        @endif
    </div>
</section>
</body>
</html>
