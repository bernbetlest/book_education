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
        <h2>Your Wallet</h2>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Wallet Balance: ${{Auth::user()->wallet->balance}}</h3>
                <a href="{{route('wallets.edit', Auth::user()->wallet)}}" class="btn btn-primary">Deposit</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Your Transaction</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="{{ $transaction->type == 'purchase' ? 'table-danger' : 'table-success' }}">
                        <td>{{ $transaction->type }}</td>
                        <td>${{ $transaction->amount }}</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>