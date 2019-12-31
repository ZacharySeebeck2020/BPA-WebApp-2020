<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - {{ config('app.name') }}</title>

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

    </style>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">
    <div class="flex md:flex-row-reverse flex-wrap">

        <!--Main Content-->
        <div class="w-full md:w-4/5">
            <div class="container pt-16 px-6">

            </div>
        </div>

        <!--Sidebar-->
        <div class="w-1/5 bg-gray-900 px-2 text-center fixed bottom-0 pt-8 top-0 left-0 h-screen border-r-4 border-gray-600"
            style="max-width: 200px">
            <div class="relative mx-auto lg:float-right lg:px-6">

                <svg class="h-16 pb-2 px-auto fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.31 47.82">
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
                </svg><br/>

                <div class="mb-4 mt-1">
                    <span class="text-gray-200 align-middle">{{ config('app.name') }} </span>
                </div>

                <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />

                <ul class="list-reset flex flex-col text-left md:mr-12 sm:mr-0 ">
                    <li class="">
                        <a href="{{ route('admin.dashboard') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-pink-600">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:font-bold block md:inline-block">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-blue-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Orders</span>
                        </a>
                    </li>
                    <li class="md:block hidden">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-green-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Products</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-orange-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Categories</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-red-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Coupons</span>
                        </a>
                    </li>


                    {{-- <div class="dropdown inline-block relative mr-3 flex-1">
                        <button class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-yellow-500">
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Your Account</span>
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-900 pt-1">
                            <li class=""><a class="bg-gray-400 hover:bg-gray-700 py-2 px-4 block whitespace-no-wrap" href="/dashboard">Account Information</a></li>

                            <li class="">
                                <a href="{{ route('logout') }}"
                    class="bg-gray-400 hover:bg-gray-700 py-2 px-4 block whitespace-no-wrap"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    </li>
                </ul>
            </div> --}}
            </ul>
        </div>
    </div>
    </div>
</body>

</html>
