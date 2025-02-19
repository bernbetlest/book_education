<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Dashboardpage - Start Bootstrap Template</title>
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

        
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <!-- Updated header text with Playfair Display font -->
            <h1 class="display-4 fw-bolder">"There is no friend as loyal as a book."
                - <span class="quote">Ernest Hemingway</span></h1>
            <p class="lead fw-normal text-white-50 mb-0"></p>
        </div>
    </div>
</header>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
    <!-- Section for Recommended Books -->
    <section class="py-5">                
                <!-- Title for the product lists -->
                <h2 class="fw-bolder text-center mb-4">All Books</h2>
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- Book 1 Little Women-->
                    @foreach ($books as $book)
                        <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            @if ($book->image)
                            <img class="card-img-top" src="{{ asset('assets/images/books/' . $book->image) }}" alt="Book Cover 1" />
                            @else
                            <img class="card-img-top" src="{{ asset('assets/images/little-women.png') }}" alt="Book Cover 1" />
                            @endif
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$book->title}}</h5>
                                     <!-- Product reviews-->
                                     <div class="d-flex justify-content-center small text-warning mb-2">
                                     </div>                                      

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{route('libraries.show', $book)}}">View Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Book 2 The Maze Runner-->
                    
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
