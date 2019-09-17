<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('./css/app.css') }}" rel="stylesheet">

    <!-- Chart.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
</head>
<body class="fixed-sn black-skin">

<!--Double navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed" style="background-image: url(/img/admin/sidebar.jpg); background-position: left;">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light" style="height: 130px;">
                    <a href="/administration"><img src="/img/admin/logo.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><p class="text-center mt-3">{{ config('app.name') }}</p></li>
                    <li><a href="/administration" class="waves-effect"><i class="fas fa-home"></i> Home</a></li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-shopping-bag"></i> Products<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="/administration/products" class="waves-effect">Product Overview</a></li>
                                <li><a href="#" class="waves-effect">All Products</a></li>
                                <li><a href="#" class="waves-effect">New Product</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-archive"></i> Orders<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#" class="waves-effect">Order Overview</a></li>
                                <li> <a href="#" class="waves-effect">New Orders</a> </li>
                                <li> <a href="#" class="waves-effect">Completed Orders</a> </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-warehouse"></i> Inventory<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#" class="waves-effect">Inventory Overview</a></li>
                                <li><a href="#" class="waves-effect">Manage Inventory</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> Accounts<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#" class="waves-effect">All Public Accounts</a></li>
                                <li><a href="#" class="waves-effect">All Admin Accounts</a></li>
                                <li><a href="#" class="waves-effect">Create A New Account</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-life-ring"></i> Support<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#" class="waves-effect">Open Support Tickets</a></li>
                                <li><a href="#" class="waves-effect">All Support Tickets</a></li>
                                <li><a href="#" class="waves-effect">General Messages</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-sm scrolling-navbar double-nav elegant-color" style="background-image: url(/img/admin/sidebar.jpg); background-blend-mode: soft-light;">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p>{{ config('app.name', 'Laravel') }} - @yield('title', 'UNDEFINED')</p>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">My Account</span></a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- /.Navbar -->
</header>
<!--/.Double navigation-->

<!--Main Layout-->
<main>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</main>
<!--Main Layout-->

@yield('scripts');

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>


{{-- MDB Sidebar Init --}}
<script>
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
</script>



</body>

</html>
