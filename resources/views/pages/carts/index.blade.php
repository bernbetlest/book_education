<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .cart-item img {
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    @include('components.navbar')
    
    <!-- Cart Items -->
    <div class="container mt-5">
        <h2>Your Cart</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        <form id="cart-form" action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="list-group mb-3">
                @foreach ($carts as $cart)
                    <div class="list-group-item d-flex justify-content-between align-items-center cart-item" data-cart-id="{{ $cart->id }}">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="cartItems[]" value="{{ $cart->id }}" class="form-check-input me-2 cart-checkbox">
                            @if ($cart->book->image)
                                <img src="{{ asset('assets/images/books/'. $cart->book->image) }}" alt="{{ $cart->book->title }}" width="50" height="50" class="me-2">     
                            @else
                                <img src="https://via.placeholder.com/150" alt="{{ $cart->book->title }}" width="50" height="50" class="me-2">                         
                            @endif
                            <div>
                                <strong>{{ $cart->book->title }}</strong> by {{ $cart->book->author }}
                                <div>Price: $ <span class="book-price">{{ $cart->book->price }}</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="number" name="quantities[{{ $cart->id }}]" value="{{ $cart->quantity }}" min="1" class="form-control quantity-input me-2" style="width: 80px;" data-cart-id="{{ $cart->id }}" data-price-per-item="{{ $cart->book->price }}">
                            <span class="text-muted me-2">Total: $ <span class="item-price">{{ $cart->quantity * $cart->book->price }}</span></span>
                            <button type="button" class="btn btn-danger btn-sm remove-btn" data-cart-id="{{ $cart->id }}">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="cart-footer d-flex justify-content-between align-items-center">
                <span>Total: $ <span id="total-price">0</span></span>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantities = document.querySelectorAll('.quantity-input');
            const checkboxes = document.querySelectorAll('.cart-checkbox');
            const totalPriceElement = document.getElementById('total-price');
            const removeButtons = document.querySelectorAll('.remove-btn');
            
            function updateTotalPrice() {
                let totalPrice = 0;
                quantities.forEach(function (input) {
                    const checkbox = input.closest('.list-group-item').querySelector('.cart-checkbox');
                    const itemPriceElement = input.closest('.list-group-item').querySelector('.item-price');
                    const pricePerItem = parseFloat(input.dataset.pricePerItem);
                    const newPrice = parseInt(input.value) * pricePerItem;
                    itemPriceElement.innerText = newPrice.toFixed(2);

                    if (checkbox.checked) {
                        totalPrice += newPrice;
                    }
                });
                totalPriceElement.innerText = totalPrice.toFixed(2);
            }

            function saveQuantity(cartId, quantity) {
                fetch(`/carts/${cartId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        quantity: quantity
                    })
                }).then(response => response.json())
                  .then(data => {
                      console.log(data);
                  }).catch(error => {
                      console.error('Error:', error);
                  });
            }

            function removeCartItem(cartId) {
                fetch(`/carts/${cartId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(response => {
                    return response.json();
                }).then(data => {
                    if (data.success) {
                        const itemElement = document.querySelector(`[data-cart-id="${cartId}"]`);
                        itemElement.remove();
                        updateTotalPrice();
                    } else {
                        console.error('Error:', data.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            }

            quantities.forEach(function (input) {
                const itemPriceElement = input.closest('.list-group-item').querySelector('.item-price');
                const pricePerItem = parseFloat(input.dataset.pricePerItem);
                itemPriceElement.dataset.pricePerItem = pricePerItem;

                input.addEventListener('change', function () {
                    const cartId = input.dataset.cartId;
                    const quantity = parseInt(input.value);
                    saveQuantity(cartId, quantity);
                    updateTotalPrice();
                });
            });

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', updateTotalPrice);
            });

            removeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const cartId = button.dataset.cartId;
                    if (confirm('Are you sure you want to remove this item from the cart?')) {
                        removeCartItem(cartId);
                    }
                });
            });

            updateTotalPrice();
        });
    </script>
</body>
</html>
