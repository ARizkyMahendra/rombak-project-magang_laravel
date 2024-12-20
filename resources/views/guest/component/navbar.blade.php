<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Agenda Bupati</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">admin Dashboard</a>
                </li>
                @endauth
            </ul>
            @auth
            <div class="d-flex">
                <h4 class="me-2">{{Auth::user()->role}} {{Auth::user()->name}}</h4> 
                <a class="btn btn-danger btn-sm" href="logout">Logout</a>
            </div>
            @endauth
            @guest
                <a class="btn btn-outline-success" href="/login" >Login</a>
            @endguest
        </div>
    </div>
</nav>