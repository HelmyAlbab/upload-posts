<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
    {{-- trixeditor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('/assets/js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group = "file-tools"]{
            display: none;
        }
    </style>
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <title>Blog Helmy | {{ $title }}</title>
</head>
<body>
    <div class="containerr">
        <!-- sidebar -->
        <div class="navigation">
            <ul class="p-0 m-0">
                <li>
                    <a href="#">
                    <span class="icon"><ion-icon name="logo-apple-appstore"></ion-icon></span>
                    <span class="title">BLOG POSTS</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard') ? 'hovered' : '' }}">
                    <a href="/dashboard">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('posts') ? 'hovered' : '' }}">
                    <a href="/posts">
                    <span class="icon"><ion-icon name="mail-unread-outline"></ion-icon></span>
                    <span class="title">Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/posts*') ? 'hovered' : '' }}"> 
                    <a href="/dashboard/posts">
                    <span class="icon"><ion-icon name="cloud-upload-outline"></ion-icon></span>
                    <span class="title">Upload Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('user') ? 'hovered' : '' }}">
                    <a href="#">
                    <span class="icon"><ion-icon name="accessibility-outline"></ion-icon></span>
                    <span class="title">Account</span>
                    </a>
                </li>

                @can('admin')
                    <li>
                        <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">ADMINISTRATOR</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('dashboard/categories*') ? 'hovered' : '' }}">
                        <a href="/dashboard/categories">
                        <span class="icon"><ion-icon name="copy-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <!-- topbar -->
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here" />
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- userimg -->
                <div class="btn-group">
                    <button type="button" class="btn text-white shadow-none dropdown-toggle" style="background: #37beb0;font-weight: 600;" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        Welcome, {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li><a class="dropdown-item" href="/posts"><ion-icon class="me-2" name="home-outline"></ion-icon> Posts</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><ion-icon class="me-2" name="log-out-outline"></ion-icon> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- content -->
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>
