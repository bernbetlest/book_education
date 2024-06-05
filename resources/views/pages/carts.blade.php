<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    @include('components.navbar')
    
    <!-- Cart Items-->
    <div class="container mt-5">
        <h2>Your Cart</h2>
        <form>
            @csrf
            <div class="list-group mb-3">
                @foreach ($carts as $cart)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <input type="checkbox" name="cartItems[]" value="{{ $cart->id }}" class="form-check-input me-2">
                            @if ($cart->book->image)
                                <img src="{{ asset('assets/images/'. $cart->book->image) }}" alt="{{ $cart->book->title }}" width="50" height="50" class="rounded-circle me-2">     
                            @else
                                <img src="https://via.placeholder.com/150" alt="{{ $cart->book->title }}" width="50" height="50" class="rounded-circle me-2">                         
                            @endif
                            <strong>{{ $cart->book->title }}</strong> by {{ $cart->book->author }}
                        </div>
                        <div>
                            <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" class="form-control quantity-input" style="width: 80px;">
                            <span class="text-muted ms-2">Rp. <span class="item-price">{{ $item->quantity * $item->book->price }}</span></span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="cart-footer d-flex justify-content-between align-items-center">
                <span>Total: Rp. <span id="total-price">0</span></span>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantities = document.querySelectorAll('.quantity-input');
            const totalPriceElement = document.getElementById('total-price');
            let totalPrice = 0;

            function updateTotalPrice() {
                totalPrice = 0;
                quantities.forEach(function (input) {
                    const itemPriceElement = input.parentElement.querySelector('.item-price');
                    const pricePerItem = parseFloat(itemPriceElement.innerText) / parseInt(input.value);
                    const newPrice = parseInt(input.value) * pricePerItem;
                    itemPriceElement.innerText = newPrice.toFixed(2);
                    totalPrice += newPrice;
                });
                totalPriceElement.innerText = totalPrice.toFixed(2);
            }

            quantities.forEach(function (input) {
                input.addEventListener('change', function () {
                    updateTotalPrice();
                });
            });

            updateTotalPrice();
        });
    </script>
</body>
</html>
