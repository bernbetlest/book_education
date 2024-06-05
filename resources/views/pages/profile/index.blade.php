<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    @include('components.navbar')
    
    <!-- Header-->
      
      <div class="text-center text-black my-2">
          <h1 class="display-4 fw-bolder">Your Profile</h1>
          <p class="lead fw-normal text-black-50 mb-0">View your personal information</p>
      </div>
    <!-- Profile Information -->
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic" id="profilePic">
                            <h3 class="card-title">John Doe</h3>
                            <p class="card-text">Username: johndoe</p>
                            <p class="card-text">Email: johndoe@example.com</p>
                            <p class="card-text">First Name: John</p>
                            <p class="card-text">Last Name: Doe</p>
                            <a href="/profile/edit" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
</body>
</html>
