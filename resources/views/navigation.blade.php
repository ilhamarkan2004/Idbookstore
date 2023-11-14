<nav class="bg-white border-gray-200 px-2 sm:px-4   ">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="/build/assets/images/logo.png" class="mr-3 h-3 md:h-7" alt="idbookstore" />
        </a>

        <div class="flex items-center md:order-2">
            @if(Auth::user() != null)
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 "
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if(Auth::user()->photoprofile == null)
                <img class="w-8 h-8 rounded-full" src="build/assets/images/profildefault.jpg" alt="user photo">
                @else
                <img class="w-8 h-8 rounded-full" src="build/assets/images/profildefault.jpg" alt="user photo">
                @endif
            </button>

            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow "
                id="user-dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900 ">{{ Auth::user()->name }}</span>
                    <span
                        class="block text-sm font-medium text-gray-400 truncate ">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                    <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    </li>
                    {{-- <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Riwayat Pembelian') }}
                             <span class="float-right top-0 right-0 bg-cyan-500 text-white rounded-full px-2">1</span>
                        </x-dropdown-link>
                    </li> --}}
                    <li>
                       <x-dropdown-link :href="route('keranjang.koleksi')">
                            {{ __('Koleksi Buku') }}
                        </x-dropdown-link>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a href="{{route('login')}}"
                class="inline-flex mr-1 items-center px-4 py-2 bg-transparent border border-transparent rounded-md font-semibold text-sm hover:bg-slate-200 hover:text-slate-600 text-black tracking-widest  ">Login</a>

            <a href="{{route('register')}}"
                class="inline-flex items-center px-4 py-2 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-cyan-800 focus:bg-cyan-900 active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ">Register</a>

            @endif

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                <li>
                    @if (!Auth::user())
                    <a href="/"
                        class="block py-2 pr-4 pl-3 text-gray-400 rounded hover:text-cyan-700 md:hover:bg-transparent active:text-cyan-700 text-lg sm:text-md"
                        aria-current="page">Beranda</a>

                    @else
                    <a href="/"
                        class="block py-2 pr-4 pl-3 text-gray-400 hover:text-cyan-700 rounded hover:bg-gray-100 md:hover:bg-transparent active:text-cyan-700 text-lg sm:text-md"
                        aria-current="page">Beranda</a>
                    @endif


                </li>
                <li>
                    <a href="/market"
                        class="block py-2 pr-4 pl-3 text-gray-400 hover:text-cyan-700  rounded hover:bg-gray-100 md:hover:bg-transparent active:text-cyan-700  text-lg sm:text-md">Market</a>
                </li>
                <li>

                </li>
                <li>
                    <div class="flex md:order-2">
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                            aria-expanded="false"
                            class="md:hidden text-gray-500  hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200  rounded-lg text-sm p-2.5 mr-1">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                        <form class="relative hidden md:block" action="/market" method="get">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Search icon</span>
                            </div>
                            <input type="text" id="search-navbar"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-100 focus:ring-cyan-500 focus:border-cyan-500 "
                                placeholder="Search..." name="search" value="" required>
                        </form>
                    </div>
                </li>
                <li class="my-auto">
                    <a class="block  py-2 pr-4 pl-3 text-gray-400 rounded hover:text-cyan-700 active:text-cyan-700 text-xl sm:text-md mr-5 "
                        href="{{route('keranjang.index')}}">
                        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
