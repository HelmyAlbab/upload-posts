<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <title>Blog Helmy | {{ $title }}</title>
    <script>
        function myFunction() {
            document.getElementById("menuDropdown").classList.toggle("active");
        }
    </script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light mt-4 fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <span style="color: #fff; font-size:1.3rem; margin-left:0.5rem"><ion-icon name="logo-android" style="font-size: 1.5rem"></ion-icon> My Blog</span> 
                </a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
    
                {{-- canvas trigger --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><span class="navbar-toggler-icon"></span></button>
                {{-- end canvas trigger --}}
    
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="nav nav-pills">
                        <li class="nav-item me-2">
                            <a class="nav-link link-navbar {{ ($active === "home") ? 'aktif' : '' }}" href="/">Home</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link link-navbar {{ ($active === "posts") ? 'aktif' : '' }}" href="/posts">Posts</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link link-navbar {{ ($active === "categories") ? 'aktif' : '' }}" href="/categories">Categories</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link link-navbar {{ ($active === "about") ? 'aktif' : '' }}" href="/about">About</a>
                        </li>
                        @auth
                            <div class="btn-group">
                                <button type="button" class="btn drop dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    Welcome, {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                    <li><a class="dropdown-item" href="/dashboard"><ion-icon class="me-2" name="home-outline"></ion-icon> Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><ion-icon class="me-2" name="log-out-outline"></ion-icon> Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <li class="nav-item me-2 ms-4">
                                <a href="/login" class="nav-link btn-custom-outline rounded" id="btn-sign">Sign In</a>
                            </li>
                            <li class="nav-item ">
                                <a href="/register" class="nav-link btn-custom rounded" id="btn-sign">Sign Up</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="offcanvas offcanvas-start sidebar-nav" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav sidebar">
                    <li>
                        <a href="/" class="{{ ($active === "home") ? 'aktif' : '' }}">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/posts" class="{{ ($active === "posts") ? 'aktif' : '' }}">
                            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                            <span class="title">Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="/categories" class="{{ ($active === "categories") ? 'aktif' : '' }}">
                            <span class="icon"><ion-icon name="layers-outline"></ion-icon></span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="about" class="{{ ($active === "about") ? 'aktif' : '' }}">
                            <span class="icon"><ion-icon name="alert-circle-outline"></ion-icon></span>
                            <span class="title">About</span>
                        </a>
                    </li>
                    <li>
                        <a href="/register">
                            <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                            <span class="title">Sign Up</span>
                        </a>
                    </li>
                    <li>
                        <a href="/login">
                            <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                            <span class="title">Sign In</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="container">
            <br><br><br>
            @yield('content')
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>