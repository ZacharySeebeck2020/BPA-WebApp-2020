<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/38ef9afc8a.js" crossorigin="anonymous"></script>

    {{-- Custom page styling. This will have to be moved into a main blade file at some point. --}}
    <style>
        /* Hero Background Image Class */
        .back-image {
            background-image: linear-gradient(to bottom, rgba(15, 15, 15, .8), rgba(15, 15, 15, .8)), url("/img/landing/hero.jpg");

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

    </style>

    @yield('style')


</head>

<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif;">

    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 text-white back-image mb-10">
        @include('layouts.navs.main')
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <div class="container mx-auto">

        @if ($errors->any())
            <div class="p-3 mt-6 lg:mt-0 rounded-lg shadow bg-red-300 text-grey-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="pl-1 pb-1 text-gray-700">»  {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="p-3 mt-6 lg:mt-0 rounded-lg shadow bg-green-300 text-grey-500">
                <ul>
                    <li class="pl-1 pb-1 text-gray-700">{{Session::get('success')}}</li>
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <!--Footer-->
    <footer class="bg-white pt-32">
        <hr class="border-b border-black opacity-25 my-0 py-0" />
        <div class="container mx-auto  px-8">

            <div class="w-full flex flex-col md:flex-row py-6">

                <div class="flex-1 mb-6 pr-32">
                    <a class="text-black no-underline hover:no-underline font-bold text-2xl lg:text-2xl" href="#">
                        <svg class="h-8 pr-3 fill-current inline px-auto" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 51.31 47.82">
                            <g>
                                <circle
                                    style="fill:none;stroke:#2a2a31;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                    cx="18.95" cy="44.14" r="2.18"></circle>
                                <circle
                                    style="fill:none;stroke:#2a2a31;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                    cx="42.95" cy="44.14" r="2.18"></circle>
                                <path
                                    style="fill:none;stroke:#2a2a31;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                    d="M1.5,1.5h8.73l5.85,29.21a4.36,4.36,0,0,0,4.36,3.51H41.65A4.36,4.36,0,0,0,46,30.71L49.5,12.41H12.41">
                                </path>
                                <rect style="fill:#91d5b5;" x="25" y="17" width="16" height="8"></rect>
                            </g>
                        </svg><br>{{ config('app.name') }}
                    </a>
                </div>

                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-orange-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

@yield('scripts')
