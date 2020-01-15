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

    @yield('style')


</head>

<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 text-white back-image">

        @include('layouts.navs.main')

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
        <div class="relative -mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
            </g>
            </g>
            </svg>
        </div>
    </nav>

    @yield('content')

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
                            <a href="{{ route('faq') }}" class="no-underline hover:underline text-gray-800 hover:text-orange-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="mailto:support@ewsg.cf"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('terms') }}"
                                class="no-underline hover:underline text-gray-800 hover:text-orange-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('privacy') }}"
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

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

@yield('scripts')
