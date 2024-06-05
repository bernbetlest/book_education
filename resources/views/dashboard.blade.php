<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard - BookEdukasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
   @include('components.navbar')

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Welcome to the Admin Panel</h1>
                <p class="lead fw-normal text-white-50 mb-0">Manage Your Bookstore With Ease</p>
            </div>
        </div>
    </header>

    <!-- Admin Panel Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bolder text-center mb-4">Admin Panel</h2>
                    <!-- Form for adding new book -->
                    <form id="addBookForm">
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title:</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="ratings" class="form-label">Ratings:</label>
                            <input type="text" class="form-control" id="ratings" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                    <hr>
                    <!-- Table for displaying existing books -->
                    <h3 class="fw-bolder text-center mb-4">Existing Books</h3>
                    <table class="table" id="bookTable">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Ratings</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Existing books will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; BookEdukasi 
        <script>document.write(new Date().getFullYear())</script></p></div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- JavaScript for Admin Panel functionality -->
</body>
</html>
