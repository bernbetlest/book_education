@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Show Book</h1>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-secondary mb-2">Back</a>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $book->image ? asset('assets/images/books/' . $book->image) : 'https://via.placeholder.com/100' }}" alt="Book Image" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: fill;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $book->title }}</h3>
                        <p><strong>Author:</strong> {{ $book->author }}</p>
                        <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                        <p><strong>Publication Date:</strong> {{ $book->publication_date }}</p>
                        <p><strong>Price:</strong> ${{ $book->price }}</p>
                        <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
                        <p><strong>Category:</strong> {{ $book->category->name }}</p>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection