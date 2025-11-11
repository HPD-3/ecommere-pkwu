<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop.co</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Animate.css for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js is NEEDED for navbar hamburger menu! -->
    <script defer src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js"></script>
    <style>
        /* Only effect, no color override */
        .navbar-blur {
            backdrop-filter: blur(8px);
            background: rgba(255,255,255,0.92);
        }
        @media (max-width: 767px) {
            .navbar-blur-forced {
                backdrop-filter: blur(8px) !important;
                background: white !important;
            }
        }
        @media (max-width: 767px) {
            .hide-on-mobile {
                display: none !important;
            }
        }
        @media (min-width: 768px) {
            .show-on-mobile {
                display: none !important;
            }
        }
    </style>
</head>

<body class="overflow-x-hidden">
    <!-- Navbar -->
    <nav 
        x-data="{ open: false }" 
        :class="open ? 'navbar-blur-forced' : 'navbar-blur'"
        class="flex items-center justify-between px-4 md:px-8 py-4 bg-white shadow-sm fixed w-full top-0 left-0 z-40 animate__animated animate__fadeInDown animate__faster"
        data-aos="fade-down" data-aos-delay="200">
        <!-- Logo -->
        <div class="text-2xl font-extrabold tracking-tight">SHOP.CO</div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <li><a href="/" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Shop</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">On Sale</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">New Arrivals</a></li>
            <li><a href="#" class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Brands</a></li>
        </ul>

        <!-- Search and Icons (desktop and mobile always shown) -->
        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Search for products..." class="hidden md:block pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg animate__animated animate__fadeInRight" data-aos="fade-left"/>
                <!-- svg for desktop only; add hide-on-mobile -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute top-2.5 left-3 text-gray-400 pointer-events-none hide-on-mobile"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                </svg>
            </div>
            <!-- Cart Icon -->
            <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn" data-aos="zoom-in">
                <i class="fa fa-shopping-cart text-xl"></i>
            </button>
            <!-- User Icon -->
            <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn" data-aos="zoom-in" data-aos-delay="200">
                <i class="fa fa-user text-xl"></i>
            </button>
        </div>

        <!-- Mobile Hamburger -->
        <button 
            @click="open = !open"
            :aria-expanded="open ? 'true' : 'false'"
            class="block md:hidden p-2 rounded-full hover:bg-gray-100 transition-all duration-200"
            aria-label="Open menu"
        >
            <svg x-show="!open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
            </svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Mobile Dropdown Menu -->
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-12"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-12"
            @click.away="open = false"
            class="fixed inset-0 top-16 bg-white z-50 flex flex-col gap-6 px-6 py-10 md:hidden animate__animated animate__fadeInDown"
            style="display: none;"
            x-cloak
        >
            <ul class="flex flex-col items-start gap-6 text-gray-800 text-lg font-semibold">
                <li><a href="#" @click="open = false" class="w-full pb-2 border-b border-gray-100">Shop</a></li>
                <li><a href="#" @click="open = false" class="w-full pb-2 border-b border-gray-100">On Sale</a></li>
                <li><a href="#" @click="open = false" class="w-full pb-2 border-b border-gray-100">New Arrivals</a></li>
                <li><a href="#" @click="open = false" class="w-full">Brands</a></li>
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
                <input type="text" placeholder="Search for products..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg"/>
                <!-- svg only for md+ (hide on mobile) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute top-2.5 left-3 text-gray-400 pointer-events-none hide-on-mobile"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                </svg>
            </div>
        </div>
        <!-- Alpine.js for state (you may need to add Alpine.js <script> in your layout for this to work) -->
    </nav>


    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between px-8 md:px-16 py-28 bg-[#f2f0f1] relative overflow-hidden" style="margin-top:64px;">
        <!-- Some animated blobs for effect only, no color change -->
        <div class="absolute w-[320px] h-[320px] rounded-full bg-[#f2f0f1] blur-3xl opacity-60 left-[-120px] top-0 animate-[bounce_5s_infinite]"></div>
        <div class="absolute w-[180px] h-[180px] rounded-full bg-white blur-2xl opacity-50 right-[-60px] bottom-12 animate-[pulse_8s_infinite]"></div>
        <!-- Left Text Content -->
        <div class="max-w-xl space-y-6 z-10" data-aos="fade-right" data-aos-delay="400">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-gray-900 animate__animated animate__fadeInUp">
                FIND <span class="animate__animated animate__heartBeat animate__infinite">CLOTHES</span> <br>
                THAT MATCHES <br> YOUR STYLE
            </h1>
            <p class="text-gray-600 text-base md:text-lg leading-relaxed animate__animated animate__fadeIn" data-aos="fade">
                Browse through our diverse range of meticulously crafted garments,
                designed to bring out your individuality and cater to your sense of style.
            </p>
            <a href="{{ url('product-search') }}">
                <button class="px-6 py-3 bg-black text-white font-medium rounded-full hover:scale-105 hover:bg-gray-800 transition transform duration-200 shadow-lg animate__animated animate__pulse animate__infinite">
                    <i class="fa fa-bolt mr-2"></i> Shop Now
                </button>
            </a>
            <!-- Stats -->
            <div class="flex flex-wrap gap-8 mt-10">
                <div data-aos="zoom-in-up" data-aos-delay="100">
                    <h3 class="text-2xl font-bold text-gray-900 counter" data-count="200">0+</h3>
                    <p class="text-gray-600 text-sm">International Brands</p>
                </div>
                <div data-aos="zoom-in-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-900 counter" data-count="2000">0+</h3>
                    <p class="text-gray-600 text-sm">High-Quality Products</p>
                </div>
                <div data-aos="zoom-in-up" data-aos-delay="300">
                    <h3 class="text-2xl font-bold text-gray-900 counter" data-count="30000">0+</h3>
                    <p class="text-gray-600 text-sm">Happy Customers</p>
                </div>
            </div>
        </div>

        <!-- Right Image Animated-->
        <div class="mt-10 md:mt-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
            <div class="w-fit group animate__animated animate__zoomIn">
                <img src="{{ asset('photos/fashion-models.png') }}" alt="Fashion Models"
                    class="w-[320px] md:w-[450px] lg:w-[550px] object-cover rounded-xl relative top-12 md:top-12 shadow-xl transition-transform duration-500 hover:scale-105 group-hover:rotate-[-2deg]"/>
                <div class="absolute bottom-16 left-8 w-32 h-8 rounded-full bg-white/60 backdrop-blur flex items-center justify-center shadow-md drop-shadow animate__animated animate__fadeInRight hidden md:flex animate-bounce-slow">
                    <i class="fa fa-star text-yellow-400 mr-2"></i>
                    <span class="text-gray-700 font-bold text-xs">Best Seller!</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Brand Logos Section -->
    <section class="bg-black py-8 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-25 z-0 star-bg"></div>
        <div
            class="flex flex-wrap justify-center items-center gap-10 md:gap-20 text-white text-lg md:text-xl font-semibold tracking-wide relative z-10 animate__animated animate__zoomIn" data-aos="fade-up">
            <span class="hover:text-gray-300 transition transform hover:scale-110 animate__animated animate__heartBeat animate__infinite">VERSACE</span>
            <span class="hover:text-gray-300 transition transform hover:scale-110">ZARA</span>
            <span class="hover:text-gray-300 transition transform hover:scale-110">GUCCI</span>
            <span class="font-bold hover:text-gray-300 transition transform hover:scale-110 animate__animated animate__pulse animate__infinite">PRADA</span>
            <span class="hover:text-gray-300 transition transform hover:scale-110">Calvin Klein</span>
        </div>
    </section>

    <section class="py-16 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <!-- New Arrivals -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold tracking-tight mb-6 animate__animated animate__jackInTheBox">NEW ARRIVALS</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Product Card -->
                    <a href="{{ url('product-detail') }}" class="block bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 group animate__animated animate__fadeInUp" data-aos="flip-left">
                        <img src="{{ asset('image/baju.png') }}" alt="T-shirt" class="rounded-lg mb-3 mx-auto transition-transform duration-300 group-hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">ONE LIFE GRAPHIC T-SHIRT</h3>
                        <p class="text-lg font-bold mt-2 animate__animated animate__bounce">Rp260.000.000</p>
                    </a>

                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 group animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="50">
                        <img src="{{ asset('photos/jeans.png') }}" alt="Jeans" class="rounded-lg mb-3 mx-auto transition-transform duration-300 group-hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Skinny Fit Jeans</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <p class="text-lg font-bold animate__animated animate__bounce">Rp3.800.000</p>
                            <p class="text-gray-400 line-through">Rp4.100.000</p>
                            <span class="bg-red-100 text-red-500 text-xs font-semibold px-2 py-1 rounded animate__animated animate__headShake">-20%</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 group animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="100">
                        <img src="{{ asset('photos/check.png') }}" alt="Checkered Shirt"
                            class="rounded-lg mb-3 mx-auto transition-transform duration-300 group-hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Checkered Shirt</h3>
                        <p class="text-lg font-bold mt-2 animate__animated animate__bounce">Rp2.850.000</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 group animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="150">
                        <img src="{{ asset('photos/orange.png') }}" alt="Striped T-shirt"
                            class="rounded-lg mb-3 mx-auto transition-transform duration-300 group-hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Sleeve Striped T-shirt</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <p class="text-lg font-bold animate__animated animate__bounce">Rp2.050.000</p>
                            <p class="text-gray-400 line-through">Rp2.500.000</p>
                            <span class="bg-red-100 text-red-500 text-xs font-semibold px-2 py-1 rounded animate__animated animate__headShake">-30%</span>
                        </div>
                    </div>
                </div>
                <button
                    class="mt-8 px-6 py-2 bg-white rounded-full hover:bg-gray-800 transition hover:text-white border border-gray-200 focus:ring-1 focus:ring-black focus:outline-none shadow-md transition-all duration-300 scale-105"
                    data-aos="zoom-in" data-aos-delay="200">
                    <i class="fa fa-caret-right mr-2"></i>View All
                </button>
            </div>

            <hr class="my-12 border-t border-gray-300">
            <!-- Top Selling -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-3xl font-extrabold tracking-tight mb-6 animate__animated animate__jackInTheBox">TOP SELLING</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 animate__animated animate__fadeInUp" data-aos="flip-left">
                        <img src="{{ asset('photos/strip.png') }}" alt="Shirt" class="rounded-lg mb-3 mx-auto transition-transform duration-300 hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Vertical Striped Shirt</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <p class="text-lg font-bold animate__animated animate__bounce">Rp3.350.000</p>
                            <p class="text-gray-400 line-through">Rp3.670.000</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="50">
                        <img src="{{ asset('photos/style.png') }}" alt="Graphic T-shirt"
                            class="rounded-lg mb-3 mx-auto transition-transform duration-300 hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Courage Graphic T-shirt</h3>
                        <p class="text-lg font-bold mt-2 animate__animated animate__bounce">Rp2.290.000</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="100">
                        <img src="{{ asset('photos/short.png') }}" alt="Shorts" class="rounded-lg mb-3 mx-auto transition-transform duration-300 hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Loose Fit Bermuda Shorts</h3>
                        <p class="text-lg font-bold mt-2 animate__animated animate__bounce">Rp1.260.000</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 animate__animated animate__fadeInUp" data-aos="flip-left" data-aos-delay="150">
                        <img src="{{ asset('photos/black.png') }}" alt="Jeans" class="rounded-lg mb-3 mx-auto transition-transform duration-300 hover:scale-105">
                        <h3 class="text-sm font-medium text-gray-800">Faded Skinny Jeans</h3>
                        <p class="text-lg font-bold mt-2 animate__animated animate__bounce">Rp3.100.000</p>
                    </div>
                </div>
                <button
                    class="mt-8 px-6 py-2 bg-white rounded-full hover:bg-gray-800 transition hover:text-white border border-gray-200 focus:ring-1 focus:ring-black focus:outline-none shadow-md transition-all duration-300 scale-105"
                    data-aos="zoom-in" data-aos-delay="250">
                    <i class="fa fa-caret-right mr-2"></i>View All
                </button>
            </div>
        </div>
    </section>

    <section class="py-16 relative overflow-visible bg-[#f2f0f1]">
        <div class="max-w-5xl mx-auto bg-white rounded-3xl p-10 shadow-md relative animate__animated animate__fadeInUp" data-aos="zoom-in-up">

            <h2 class="text-center text-2xl font-extrabold tracking-wide mb-10 animate__animated animate__pulse animate__infinite">
                BROWSE BY DRESS STYLE
            </h2>

            <!-- 2-column grid with uneven spans -->
            <div class="grid grid-cols-3 gap-4">
                <!-- Casual (small left) -->
                <div class="col-span-1 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-right" data-aos-delay="50">
                    <img src="{{ asset('photos/casual.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Casual">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Casual</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Daily Favorite</span>
                </div>

                <!-- Formal (big right) -->
                <div class="col-span-2 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-left" data-aos-delay="100">
                    <img src="{{ asset('photos/formal.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Formal">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Formal</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Elegant Style</span>
                </div>

                <!-- Party (big left) -->
                <div class="col-span-2 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-left" data-aos-delay="150">
                    <img src="{{ asset('photos/gym.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Gym">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Gym</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Sport Spirit</span>
                </div>

                <!-- Gym (small right) -->
                <div class="col-span-1 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-right" data-aos-delay="200">
                    <img src="{{ asset('photos/party.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="party">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Party</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Let's Celebrate</span>
                </div>

            </div>
        </div>
    </section>


    <footer class="bg-[#f2f0f1] pt-12 pb-8 relative overflow-hidden" data-aos="fade-up">
        <!-- Newsletter Banner -->
        <div class="max-w-6xl mx-auto rounded-3xl p-6 sm:p-8 md:p-10 bg-black text-white flex flex-col lg:flex-row items-center justify-between gap-8 sm:gap-12 shadow-xl animate__animated animate__fadeInUp" data-aos="flip-down">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold leading-tight text-center lg:text-left">
                STAY UPTO DATE ABOUT <br class="hidden sm:block"> OUR LATEST OFFERS
            </h2>
            <form class="w-full max-w-md flex flex-col sm:flex-row items-center gap-4" autocomplete="off">
                <div class="relative w-full">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input
                        type="email"
                        placeholder="Enter your email address"
                        class="w-full pl-10 pr-4 py-3 rounded-full text-black placeholder-gray-500 focus:outline-none transition-shadow focus:shadow-xl"
                        required
                    >
                </div>
                <button type="submit" class="bg-white text-black font-semibold py-3 px-8 rounded-full w-full sm:w-auto transition transform hover:scale-105 shadow-md">
                    <i class="fa fa-paper-plane mr-2"></i>Subscribe to Newsletter
                </button>
            </form>
        </div>

        <!-- Main Footer -->
        <div class="max-w-6xl mx-auto mt-12 px-4 sm:px-6 animate__animated animate__fadeInUp" data-aos="fade-in" data-aos-delay="300">
            <div class="flex flex-col gap-10 lg:grid lg:grid-cols-5 lg:gap-8">
                <!-- Logo + Text -->
                <div class="lg:col-span-2 flex flex-col mb-8 lg:mb-0">
                    <h1 class="text-2xl sm:text-3xl font-black mb-4 ">SHOP.CO</h1>
                    <p class="text-gray-600 mb-6 max-w-md text-base sm:text-sm">
                        We have clothes that suit your <span class="font-semibold">style</span> and which you're proud to wear.
                        From women to men.
                    </p>
                    <div class="flex gap-4 text-lg sm:text-xl text-gray-700 animate__animated animate__fadeInRight">
                        <a href="#" aria-label="Twitter" class="hover:scale-125 transition"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" aria-label="Facebook" class="hover:scale-125 transition"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" aria-label="Instagram" class="hover:scale-125 transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="GitHub" class="hover:scale-125 transition"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <!-- Company -->
                <div class="mb-8 lg:mb-0 text-center lg:text-left">
                    <h3 class="font-bold mb-4 text-base">COMPANY</h3>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li><a href="#" class="hover:text-black transition">About</a></li>
                        <li><a href="#" class="hover:text-black transition">Features</a></li>
                        <li><a href="#" class="hover:text-black transition">Works</a></li>
                        <li><a href="#" class="hover:text-black transition">Career</a></li>
                    </ul>
                </div>
                <!-- Help -->
                <div class="mb-8 lg:mb-0 text-center lg:text-left">
                    <h3 class="font-bold mb-4 text-base">HELP</h3>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li><a href="#" class="hover:text-black transition">Customer Support</a></li>
                        <li><a href="#" class="hover:text-black transition">Delivery Details</a></li>
                        <li><a href="#" class="hover:text-black transition">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:text-black transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- FAQ -->
                <div class="mb-8 lg:mb-0 text-center lg:text-left">
                    <h3 class="font-bold mb-4 text-base">FAQ</h3>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li><a href="#" class="hover:text-black transition">Account</a></li>
                        <li><a href="#" class="hover:text-black transition">Manage Deliveries</a></li>
                        <li><a href="#" class="hover:text-black transition">Orders</a></li>
                        <li><a href="#" class="hover:text-black transition">Payments</a></li>
                    </ul>
                </div>
            </div>

            <hr class="my-12 border-t border-gray-300">
            <!-- Bottom Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-10 text-gray-500 text-xs sm:text-sm gap-4 px-2 animate__animated animate__fadeIn animate__delay-2s">
                <p class="text-center md:text-left">
                    Shop.co © 2025-2026, All Rights Reserved ✨ 
                </p>
            </div>
        </div>
    </footer>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 900, once: false });
      // Fun counter up effect for stats
      document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.counter').forEach((counter) => {
            let target = +counter.dataset.count;
            let count = 0;
            let plus = Math.ceil(target/60);
            const loop = setInterval(() => {
                count += plus;
                counter.innerText = count.toLocaleString() + "+";
                if (count >= target) {
                    counter.innerText = target.toLocaleString() + "+";
                    clearInterval(loop);
                }
            }, 16);
        });
      });
      // Optional Star BG for branding
      if (document.querySelector('.star-bg')) {
        let s = '';
        for (let i=0;i<18;i++) {
          let top = Math.random()*90;
          let left = Math.random()*98;
          let size = 1+Math.random()*2;
          s += `<div style='position:absolute;top:${top}%;left:${left}%;background:white;opacity:0.7;border-radius:100%;width:${size+2}px;height:${size+2}px;'></div>`;
        }
        document.querySelector('.star-bg').innerHTML = s;
      }
    </script>
</body>

</html>