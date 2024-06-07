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
                            @if (Auth::user()->image)
                                <img src="{{ asset('assets/images/' . Auth::user()->image) }}" alt="Profile Picture" class="profile-pic" id="profilePic">
                            @else
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic" id="profilePic">
                            @endif
                            <h3 class="card-title">{{Auth::user()->username}}</h3>
                            <p class="card-text">Email: {{Auth::user()->email}}</p>
                            <p class="card-text">First Name: {{Auth::user()->fname}}</p>
                            <p class="card-text">Last Name: {{Auth::user()->lname}}</p>
                            <p class="card-text">Address: {{Auth::user()->address ?? '-'}}</p>
                            <p class="card-text">Phone Number: {{Auth::user()->phone ?? '-'}}</p>
                            <p class="card-text">Date of Birth: {{Auth::user()->date_of_birth ?? '-'}}</p>
                            @if (Auth::user()->wallet)
                            <p class="card-text">Wallet Balance: ${{Auth::user()->wallet->balance}}</p>
                            @else
                            <p class="card-text">Wallet Balance: $0</p>
                            @endif
                            <a href="{{route('profile.edit')}}" class="btn btn-primary">Edit Profile</a>
                            @if (Auth::user()->wallet)
                                <a href="{{route('wallets.index')}}" class="btn btn-primary">View Wallet</a>
                            @else
                                <a href="{{route('wallets.create')}}" class="btn btn-primary">Create Wallet</a> 
                            @endif
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
