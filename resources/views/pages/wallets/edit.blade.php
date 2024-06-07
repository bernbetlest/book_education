<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Deposit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <!-- Navigation-->
    @include('components.navbar')
    
    <!-- Deposit Form-->
    <div class="container mt-5">
        <h2>Deposit</h2>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Wallet Balance: ${{Auth::user()->wallet->balance}}</h3>
                <form action="{{route('wallets.update', Auth::user()->wallet)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="balance" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="balance" name="balance" required>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Deposit</button>
                </form>
            </div>
        </div>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>