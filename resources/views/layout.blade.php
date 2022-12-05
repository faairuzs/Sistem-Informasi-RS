<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Informasi Rumah Sakit</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', 'sans-serif';
            }
        </style>
    </head>
    <body class="antialiased">

        <nav class="navbar bg-success">
            <div class="container-fluid my-2">
              <a class="navbar-brand fw-semibold text-white mx-4 fs-2" href="{{ route('dokter.index') }}">Sistem Informasi Rumah Sakit</a>
                          <!-- Right Side Of Navbar -->
             <ul class="navbar-nav ms-auto flex-row gap-4 mx-4"> 
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('dokter.index') }}">{{ __('Dokter') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('pasien.index') }}">{{ __('Pasien') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('obat.index') }}">{{ __('Obat') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('kamar.index') }}">{{ __('Kamar') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('join') }}">{{ __('Rekam Medis') }}</a>
                                </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>