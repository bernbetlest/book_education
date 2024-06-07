<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <!-- Navigation-->
    @include('components.navbar')
    
    <!-- Cart Items-->
    <div class="container mt-5">
        <h2>Create New Wallet</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{route('wallets.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="balance" class="form-label">Initial Balance</label>
                        <input type="number" class="form-control" id="balance" name="balance" required>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Wallet</button>
                </form>
            </div>
        </div>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>