@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Show Sale</h1>
        </div>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary mb-2">Back</a>
        <div class="card">
            <div class="card-body">
                <h3>User</h3>
                <p><strong>Username:</strong> {{ $sale->user->username }}</p>
                <p><strong>Email:</strong> {{ $sale->user->email }}</p>
                <p><strong>Full Name:</strong> {{ $sale->user->fname . ' ' .$sale->user->lname }}</p>
                <p><strong>Phone:</strong> {{ $sale->user->phone }}</p>
                <p><strong>Address:</strong> {{ $sale->user->address }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $sale->book->image ? asset('assets/images/books/' . $sale->book->image) : 'https://via.placeholder.com/100' }}" alt="Book Image" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: fill;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $sale->book->title }}</h3>
                        <p><strong>Author:</strong> {{ $sale->book->author }}</p>
                        <p><strong>Publisher:</strong> {{ $sale->book->publisher }}</p>
                        <p><strong>Publication Date:</strong> {{ $sale->book->publication_date }}</p>
                        <p><strong>Price:</strong> ${{ $sale->book->price }}</p>
                        <p><strong>Quantity:</strong> {{ $sale->quantity }}</p>
                        <p><strong>Category:</strong> {{ $sale->book->category->name }}</p>
                        <p><strong>Description:</strong> {{ $sale->book->description }}</p>
                        <p><strong>Status:</strong> {{ $sale->status }}</p>
                        <p><strong>Created at:</strong> {{ $sale->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3>Sale</h3>
                <p><strong>Quantity:</strong> {{ $sale->quantity }}</p>
                <p><strong>Total Price:</strong> ${{ $sale->total }}</p>
                <p><strong>Payment Status:</strong> {{ $sale->status }}</p>
                @if ($sale->status == 'completed')                  
                <p><strong>Payment Date:</strong> {{ $sale->transaction->wallet->created_at }}</p>
                @endif
            </div>
        </div>


    </div>
@endsection