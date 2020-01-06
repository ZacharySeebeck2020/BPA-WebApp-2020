<div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

    <div class="pl-4 flex items-center">
        <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-2xl" href="/">
            <svg class="h-8 pr-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.31 47.82">
                <g>
                    <circle style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                        cx="18.95" cy="44.14" r="2.18"></circle>
                    <circle style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
                        cx="42.95" cy="44.14" r="2.18"></circle>
                    <path style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;"
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
                <a class="inline-block py-2 px-4 text-white font-bold no-underline" href="{{ route('landing') }}">Home</a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                    href="{{ route('products.index') }}">All Products</a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                    href="{{ route('products.featured') }}">Featured Products</a>
            </li>
            @guest
            <li class="mr-3">
                <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                    href="{{ route('register') }}">Sign Up</a>
            </li>
            <li class="mr-3">
                <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                    href="{{ route('login') }}">Login</a>
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
                    @if (\Auth::user()->is_administrator)
                        <li class=""><a class="bg-gray-300 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                    @endif

                    <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="{{ route('user.dashboard') }}">Account Information</a></li>
                    <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="{{ route('user.orders') }}">Your Orders</a></li>

                    <li class="">
                        <a href="{{ route('logout') }}"
                            class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            @endguest
            <li class="mr-3">
                <a class="inline-block text-white no-underline hover:text-gray-300 hover:text-underline py-2 px-4"
                    href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> ({{ App\Cart::getActiveCart()->productCount() }})</a>
            </li>
        </ul>
    </div>
</div>
