@extends('pages.dashboard.layouts.template')
@section('content')
    <div class="content py-2">
        <div class="text-center text-black my-2">
             <h1 class="display-4 fw-bolder">Edit Your Profile</h1>
             <p class="lead fw-normal text-black-50 mb-0">Update your personal information
          <section class="py-2">
        <div class="container px-4 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('profile.update')}}" id="profileForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Profile Picture -->
                        <div class="mb-3 text-center">
                            <img src="{{ Auth::user()->image ? asset('assets/images/' . Auth::user()->image) : 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="profile-pic" id="profilePic">
                            <input type="file" class="form-control mt-3" name="image" id="profilePicInput" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" placeholder="Enter your email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" value="{{Auth::user()->fname}}" placeholder="Enter your first name">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname"value="{{Auth::user()->lname}}" placeholder="Enter your last name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{Auth::user()->username}}" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}" placeholder="Enter your address">
                        </div>
                         <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{Auth::user()->phone}}" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label" >Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{Auth::user()->date_of_birth}}" placeholder="Enter your date of birth">
                        </div>                        

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
