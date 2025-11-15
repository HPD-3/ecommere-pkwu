<nav 
        x-data="{ open: false }" 
        :class="open ? 'navbar-blur-forced' : 'navbar-blur'"
        class="flex items-center justify-between px-4 md:px-8 py-4 bg-white shadow-sm fixed w-full top-0 left-0 z-40 animate__animated animate__fadeInDown animate__faster"
        data-aos="fade-down" data-aos-delay="200">
        <div class="text-2xl font-extrabold tracking-tight">SHOP.CO</div>
        <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <li><a href="/" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Shop</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">On Sale</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">New Arrivals</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Brands</a></li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="relative">
                <form action="/product-search" method="GET" class="hidden md:block">
                    <input name="q" type="text" placeholder="Search for products..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg animate__animated animate__fadeInRight" data-aos="fade-left"/>
                    <button type="submit" class="absolute top-2.5 left-3 text-gray-400 p-0 m-0 bg-transparent border-none cursor-pointer" style="width: 20px; height: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn" data-aos="zoom-in">
                <i class="fa fa-shopping-cart text-xl"></i>
            </button>
            <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn" data-aos="zoom-in" data-aos-delay="200">
                <i class="fa fa-user text-xl"></i>
            </button>
        </div>
        <button 
            @click="open = !open"
            :aria-expanded="open ? 'true' : 'false'"
            class="block md:hidden p-2 rounded-full hover:bg-gray-100 transition-all duration-200"
            aria-label="Open menu">
            <svg x-show="!open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
            </svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-12"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-12"
            @click.away="open = false"
            :class="open ? 'mobile-menu-colored' : ''"
            class="fixed inset-0 top-16 z-50 flex flex-col gap-6 px-6 py-10 md:hidden animate__animated animate__fadeInDown"
            style="display: none;"
            x-cloak
        >
            <ul class="flex flex-col items-start gap-6 text-gray-800 text-lg font-semibold flex-1 justify-center">
                <li class="w-full"><a href="#" @click="open = false" class="block w-full pb-2 border-b border-gray-100">Shop</a></li>
                <li class="w-full"><a href="#" @click="open = false" class="block w-full pb-2 border-b border-gray-100">On Sale</a></li>
                <li class="w-full"><a href="#" @click="open = false" class="block w-full pb-2 border-b border-gray-100">New Arrivals</a></li>
                <li class="w-full"><a href="#" @click="open = false" class="block w-full">Brands</a></li>
            </ul>
            <div class="flex gap-4 mt-4">
                <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200">
                    <i class="fa fa-shopping-cart text-xl"></i>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200">
                    <i class="fa fa-user text-xl"></i>
                </button>
            </div>
            <div class="mt-4 w-full relative">
                <form action="/product-search" method="GET" class="w-full">
                    <input name="q" type="text" placeholder="Search for products..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg"/>
                    <button type="submit" class="absolute top-2.5 left-3 text-gray-400 p-0 m-0 bg-transparent border-none cursor-pointer" style="width: 20px; height: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>