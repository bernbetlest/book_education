  <div class="sidebar">
        <div>
            <div class="profile">
                <img src="{{ Auth::user()->image ? asset('assets/images/' . Auth::user()->image) : 'https://via.placeholder.com/100' }}" alt="Profile Picture">
                <h3>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link active" href="{{route('dashboard')}}">Home</a>
                <a class="nav-link" href="{{route('books.index')}}">Books</a>
                <a class="nav-link" href="{{route('sales.index')}}">Sales</a>
                <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                <a class="nav-link" href="{{route('profile.index')}}">Profile</a>
            </nav>
        </div>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>