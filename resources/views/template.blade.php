<!DOCTYPE html>
<html>

<head>
    <title>Produk Kasir Online </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/fontawesome-free/css/all.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="row main-sid">
        <div class="col-md-3 position-sticky sidiv">
            <div class="card text-white bgcolor side ">
                <div class="card-header text-center">Waroeng Komputer</div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-12 text-center">
                            <img src="{{ url('/images/logo.png') }}" class="logo rounded mx-auto" alt="Responsive image">
                        </div>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <div class="userName text-center bgcolorneo">
                        <p class="titleProduct bgcolorneo">
                            {{ Auth::user()->name }}
                        </p>

                    </div>
                    @endauth
                    @endif
                    <div class="row btnhov">
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}"><button type="button" class="p-3 btn btn-block bgcolorneo spacer">Home</button> </a>
                        </div>
                    </div>


                    @guest
                    <div class="row btnhov">
                        <div class="col-md-12">
                            <a href="{{ route('login') }}">
                                <button type="button" class="p-3 btn btn-block bgcolorneo spacer_1">Login</button>
                            </a>
                        </div>
                    </div>

                    <div class="row btnhov">
                        <div class="col-md-12">
                            <a href="{{ route('register') }}">
                                <button type="button" class="p-3 btn btn-block bgcolorneo spacer_1">Register</button>
                            </a>
                        </div>
                    </div>
                    @endguest
                    @if (Route::has('login'))
                    @auth

                    <div class="row btnhov">
                        <div class="col-md-12">
                            <a href="/create">
                                <button type="button" class="p-3 btn btn-block bgcolorneo spacer_1">Masukkan Produk</button>
                            </a>
                        </div>
                    </div>

                    <div class="row btnhov">
                        <div class="col-md-12 ">
                            <a href="/manajemen">
                                <button type="button" class="btn p-3 btn-block bgcolorneo spacer_1">Manajemen Produk</button>
                            </a>
                        </div>
                    </div>

                    <div class="row btnlog btnhov">
                        <div class="col-md-12">
                            <a href="{{ route('logout') }}">
                                <button type="button" class="p-3 btn btn-block bgcolorneo spacer_1" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    @endauth
                    @endif

                </div>

            </div>

        </div>
        <div class="col-md-8">
            <div class="container card bg-light spacer">
                @yield('content')

            </div>
        </div>

    </div>
    <div class="row footer spacer">
        <div class="col-md-12">
            <p class="text-center">Created By Kelompok 4 </p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>