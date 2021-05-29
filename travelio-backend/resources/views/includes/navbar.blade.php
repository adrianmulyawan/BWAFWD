<!-- buat navbar & simpan didalam container -->
<div class="container">
    <!-- membuat navigation -->
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <!-- logo perusahaan -->
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('frontend/images/logo Aplikasi 1 2x.png') }}" alt="Logo Travelio">
        </a>

        <!-- button responsive -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- button menu website -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2 active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item mx-md-2">
                  <a class="nav-link" href="#">Travel Package</a>
                </li>

                <li class="nav-item mx-md-2 dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Service
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Passport</a>
                    <a class="dropdown-item" href="#">VISA</a>
                  </div>
                </li>

                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="#">Testimonial</a>
                </li>
            </ul>

            {{-- BUTTON LOGIN DAN LOGOUT --}}
            {{-- Untuk Guest/Tidak Login --}}
            @guest
                <!-- Mobile Button Login -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Login
                    </button>
                </form>
            
                <!-- Desktop Button Login -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Login
                    </button>
                </form>
            @endguest
            {{-- Untuk User yang sudah login --}}
            @auth
                <!-- Mobile Button Login -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0">
                        Logout
                    </button>
                </form>
            
                <!-- Desktop Button Login -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>