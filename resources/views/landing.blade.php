<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

    {{-- Custom page styling. This will have to be moved into a main blade file at some point. --}}
    <style>
        /* Hero Background Image Class */
        .back-image {
            background-image: linear-gradient(to bottom, rgba(148, 148, 148, .2), rgba(70, 70, 70, .8)), url("/img/landing/hero.jpg");

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

    </style>

</head>

<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif;">

    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 text-white back-image">

        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

            <div class="pl-4 flex items-center">
                <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <svg class="h-8 pr-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 51.31 47.82">
                        <g>
                            <circle
                                style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                cx="18.95" cy="44.14" r="2.18"></circle>
                            <circle
                                style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                cx="42.95" cy="44.14" r="2.18"></circle>
                            <path
                                style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                                d="M1.5,1.5h8.73l5.85,29.21a4.36,4.36,0,0,0,4.36,3.51H41.65A4.36,4.36,0,0,0,46,30.71L49.5,12.41H12.41">
                            </path>
                            <rect style="fill:#91d5b5;" x="25" y="17" width="16" height="8"></rect>
                        </g>
                    </svg>

                    {{ config('app.name') }}
                </a>
            </div>

            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-white hover:text-gray-300">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>

            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-white font-bold no-underline" href="#">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                            href="#">All Products</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                            href="#">Featured Products</a>
                    </li>

                    @guest
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                            href="/register">Sign Up</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                            href="/login">Login</a>
                    </li>
                    @else
                        <div class="dropdown inline-block relative">
                            <button class="text-white py-2 px-4 rounded inline-flex items-center">
                                <span class="mr-1">Your Account</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 w-48">
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">My Orders</a></li>


                                <li class="">
                                    <a href="{{ route('logout') }}"
                                        class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>

        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />

        <!--Hero-->
        <div class="py-24">

            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left sm:text-center">
                    <h1 class="my-4 text-5xl font-bold leading-tight">Winter is here!</h1>
                    <p class="leading-normal text-2xl mb-8">Why not get something new to keep you warm, but stylish!
                    </p>
                </div>

            </div>

        </div>

    </nav>

    <!--Footer-->
    <footer class="bg-white pt-64">
        <hr class="border-b border-black opacity-25 my-0 py-0" />
        <div class="container mx-auto  px-8">

            <div class="w-full flex flex-col md:flex-row py-6">

                <div class="flex-1 mb-6 pr-32">
                    <a class="text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
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
                        </svg>{{ config('app.name') }}
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
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by freepik -
            www.freepik.com</a>

    </footer>




    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->

    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener('scroll', function () {

            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-gray-800");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");

            }

        });

    </script>

    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }

    </script>


</body>

</html>
