<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Book Detail - {{ $book->title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
@include('components.navbar')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <a href="{{ route('libraries.index') }}" class="btn btn-primary mb-3">Back</a>
        <div class="row">
            <div class="col-md-5">
                @if ($book->image)
                    <img src="{{ asset('assets/images/' . $book->image) }}" alt="{{ $book->title }}" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/400x500" alt="{{ $book->title }}" class="img-fluid">
                @endif
            </div>
            <div class="col-md-7">
                <h1 class="display-5">{{ $book->title }}</h1>
                <p class="lead">by {{ $book->author }}</p>
                <p class="mb-4">{{ $book->description }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p><strong>Publication Date:</strong> {{ $book->publication_date }}</p>
                <p><strong>Category:</strong> {{ $book->category->name }}</p>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
