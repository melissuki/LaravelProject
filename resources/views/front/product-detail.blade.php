
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $product->name }} - TechShop</title>
<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <h4 class="text-primary">${{ $product->price }}</h4>
            <p>{{ $product->description }}</p>
            <button class="btn btn-outline-dark" onclick="addToCart('{{ $product->name }}')">Add to Cart</button>
            <a href="/" class="btn btn-secondary">Back to Shop</a>
        </div>
    </div>
</div>
<script>
    function addToCart(productName) {
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ name: productName })
        })
            .then(response => response.json())
            .then(data => {
                alert(productName + " added to your cart!");
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
</body>
</html>
