<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .button-home,
        .username-button,
        .logout-button {
            text-decoration: none;
            position: fixed;
            top: 5px;
            width: 9em;
            height: 3em;
            line-height: 2em;
            text-align: center;
            border: none;
            font-size: 14px;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(90deg, #964B00, #F5DEB3);
            background-size: 300%;
            border-radius: 30px;
            z-index: 1;
        }

        .button-home {
            left: 0;
        }

        .username-button {
            right: 10%;
            transform: translateX(10%);
        }

        .logout-button {
            right: 0;
            width: 9em; /* Ajouter cette propriété pour fixer la largeur */
            height: 3.5em; /* Ajouter cette propriété pour fixer la hauteur */
        }

        .button-home:hover,
        .username-button:hover,
        .logout-button:hover {
            animation: ani 8s linear infinite;
            border: none;
        }

        @keyframes ani {
            0% {
                background-position: 0%;
            }

            100% {
                background-position: 400%;
            }
        }
        
        .button-home:before,
        .username-button:before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            background: linear-gradient(90deg, #964B00, #F5DEB3);
            background-size: 400%;
            border-radius: 35px;
            transition: 1s;
        }
        .logout-button::before,
        .button-home:hover::before,
        .username-button:hover::before {
            filter: blur(20px);
        }

        .button-home:active,
        .username-button:active,
        .logout-button:active {
            background: linear-gradient(32deg, #964B00, #F5DEB3);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-brand">
                    <div>
                        <a href="{{ url('/') }}">
                            <button class="button-home">Home</button>
                        </a>
                    </div>
                    <div class="username-button">
                        @guest
                        @else
                            <a id="navbarDropdown" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <button class="button-home">{{ Auth::user()->name }}</button>
                            </a>
                        @endguest
                    </div>
                    <div class="logout-button">
                        @guest
                        @else
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button class="logout-button">Log out</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
