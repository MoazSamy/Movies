<!DOCTYPE html>
<head>
    <title>Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/FormsCss/general.css" rel="stylesheet">
    <link href="/FormsCss/Registration.css" rel="stylesheet">
    <link href="/FormsCss/addMovie.css" rel="stylesheet">
    <link href="/FormsCss/navbar.css" rel="stylesheet">
    <link href="/FormsCss/home.css" rel="stylesheet">
    <link href="/FormsCss/dashboard.css" rel="stylesheet">
    <link href="/FormsCss/login.css" rel="stylesheet">
</head>
    <body>
        <nav>
            <ul>
                <!--BUTTONS-->
                <li>
                    <a href="/" class="movie">
                        Movies
                    </a>
                </li>
                <li>
                    <a href="/categories" id="category">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="/actors" class="actor">
                        Actors
                    </a>
                </li>
                    
                <!--LOGIN AUTHENTICATION-->
                @auth
                    <!--ADMIN AUTHENTICATION-->
                    @if (auth()->user()->isAdmin)
                        <li>
                            <a href="/admin/movies/create" class="register">Add</a>
                        </li>
                        
                        <li>
                            <a href="/admin/movies" class="register">Dashboard</a>
                        </li>
                    @endif
                    <!--END OF ADMIN AUTHENTICATION-->
                    <li>
                        <span>{{ucwords(auth()->user()->name)}}</span>
                    </li>
                @else
                    <li>
                        <a href="/login" class="register">Login</a>
                    </li>
                    <li>
                        <a href="/register" class="register"> Register </a>
                    </li>
                @endauth
                <!--END OF LOGIN AUTHENTICATION-->
                <!--END OF BUTTONS-->

                <!--SEARCHBAR-->
                <li style="padding:2px;">
                    <form method="GET" action="#">
                        <input  type="text" 
                                placeholder="Enter a movie name.."
                                name="search"
                                value="{{request('search')}}">
                    </form>
                </li>
                <!--LOGOUT BUTTON-->
                @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="logout">Log Out</button>
                </form>
                @endauth
                <!--END OF LOGOUT BUTTON-->
            </ul>
        </nav>
        @yield('content')
        <!--SUCCESS MESSAGE CODE-->
        @if (session()->has("success"))
            <div class="success" id="successmessage">
                <p>{{session("success")}}</p>
            </div>
            <script src="/general.js"></script>
        @endif
        <!--END OF SUCCESS MESSAGE CODE-->
    </body>
    
   

    

