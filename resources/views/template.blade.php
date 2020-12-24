<!DOCTYPE html>
<html>

<head>
    <title>Produk Kasir Online </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="row">
        <div class="col-md-3 position-sticky">
            <div class="card text-white bg-primary side">
                <div class="card-header text-center">Produk Kasir Online Kita</div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-12 text-center">
                            <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-social-logo.png" class="logo rounded mx-auto" alt="Responsive image">
                        </div>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @endauth
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-block btn-danger spacer">Home</button> </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('login') }}">
                                <button type="button" class="btn btn-block btn-danger spacer_1">Login</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('register') }}">
                                <button type="button" class="btn btn-block btn-danger spacer_1">Register</button>
                            </a>
                        </div>
                    </div>

                    @if (Route::has('login'))
                    @auth

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('posts.create') }}">
                                <button type="button" class="btn btn-block btn-danger spacer_1">Masukkan Produk</button>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="/manajemen">
                                <button type="button" class="btn btn-block btn-danger spacer_1">Manajemen Produk</button>
                            </a>
                        </div>
                    </div>

                    @endauth
                    @endif

                </div>

            </div>

        </div>
        <div class="col-md-8">
            <div class="container card bg-light">
                @yield('content')

            </div>
        </div>

    </div>
    <div class="row footer  ">
        <div class="col-md-12">
            <p class="text-center">Created By Kelompok 4 </p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>