@extends('pages.dashboard.layouts.template')
@section('content')
    <div class="content py-2">
        <div class="text-center text-black my-2">
             <h1 class="display-4 fw-bolder">Your Profile</h1>
             <p class="lead fw-normal text-black-50 mb-0">View your personal information</p>
         </div>
          <section class="py-2">
        <div class="container px-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body text-center py-5">
                            @if (Auth::user()->image)
                                <img src="{{ asset('assets/images/' . Auth::user()->image) }}" alt="Profile Picture" class="profile-pic mb-4" id="profilePic">
                            @else
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic mb-4" id="profilePic">
                            @endif
                            <h3 class="card-title h2 mb-3">{{Auth::user()->username}}</h3>
                            <p class="card-text mb-2"><strong>Email:</strong> {{Auth::user()->email}}</p>
                            <p class="card-text mb-2"><strong>First Name:</strong> {{Auth::user()->fname}}</p>
                            <p class="card-text mb-2"><strong>Last Name:</strong> {{Auth::user()->lname}}</p>
                            <p class="card-text mb-2"><strong>Address:</strong> {{Auth::user()->address ?? '-'}}</p>
                            <p class="card-text mb-2"><strong>Phone Number:</strong> {{Auth::user()->phone ?? '-'}}</p>
                            <p class="card-text mb-2"><strong>Date of Birth:</strong> {{Auth::user()->date_of_birth ?? '-'}}</p>
                            <a href="{{route('profile.edit')}}" class="btn btn-primary mt-4">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
