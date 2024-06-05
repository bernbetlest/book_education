<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - BookEdukasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f8fa;
            font-family: 'Playfair Display', serif;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: white;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signup-link {
            text-align: center;
            margin-top: 10px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .page-heading {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('components.navbar')

    <!-- Login Form Container -->
    <div class="container login-container">
        <h2 class="page-heading">Login</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Added text and link for Sign Up -->
            <div class="mb-3 signup-link">
                <p>Don't have an Account? <a href="register">Sign Up!</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->

    <script src="{{asset('assets/js/scripts.js')}}"></script>

</body>

</html>
