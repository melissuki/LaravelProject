
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

        @if(empty($cart))
            <div class="alert alert-info">
                Your cart is currently empty. Start shopping now to find your favorite items!
            </div>
            <a href="/" class="btn btn-dark">Start Shopping</a>
        @else
            <ul class="list-group mb-4">
                @foreach($cart as $index => $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item }}
                        <button class="btn btn-danger btn-sm" onclick="removeItem({{ $index }})">
                            Remove
                        </button>
                    </li>
                @endforeach
            </ul>
            <a href="/" class="btn btn-dark">Keep Shopping</a>
        @endif
    </div>
</section>
<script>
    function removeItem(index) {
        fetch('{{ route("cart.remove") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ index: index })
        })
            .then(response => response.json())
            .then(data => {
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
