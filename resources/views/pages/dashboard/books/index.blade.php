@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Books</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Add Book</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Publication Date</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td style="width: 150px; height:200px;">
                                <img src="{{ $book->image ? asset('assets/images/books/' . $book->image) : 'https://via.placeholder.com/100' }}" alt="Book Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->publication_date }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td class="">
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm mr-1">View</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection