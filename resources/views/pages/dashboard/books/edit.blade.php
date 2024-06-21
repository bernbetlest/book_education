@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Edit Book</h1>
        </div>
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" placeholder="Enter book title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $book->author }}" placeholder="Enter book author" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" name="publisher" id="publisher" value="{{ $book->publisher }}" placeholder="Enter book publisher" required>
            </div>
            <div class="mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" class="form-control" name="publication_date" id="publication_date" value="{{ $book->publication_date }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ $book->price }}" placeholder="Enter book price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $book->quantity }}" placeholder="Enter book quantity" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Book Image</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                @if($book->image)
                    <img src="{{ asset('storages/assets/images/books/' . $book->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter book description">{{ $book->description }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
