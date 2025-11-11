<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop.co</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Animate.css for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js is NEEDED for navbar hamburger menu! -->
    <script defer src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js"></script>
    <style>
        /* Only effect, no color override */
        .navbar-blur {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.92);
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
    <nav x-data="{ open: false }" :class="open ? 'navbar-blur-forced' : 'navbar-blur'"
        class="flex items-center justify-between px-4 md:px-8 py-4 bg-white shadow-sm fixed w-full top-0 left-0 z-40 animate__animated animate__fadeInDown animate__faster"
        data-aos="fade-down" data-aos-delay="200">
        <!-- Logo -->
        <div class="text-2xl font-extrabold tracking-tight">SHOP.CO</div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <li><a href="/"
                    class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Shop</a>
            </li>
            <li><a href="#"
                    class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">On
                    Sale</a></li>
            <li><a href="#"
                    class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">New
                    Arrivals</a></li>
            <li><a href="#"
                    class="hover:text-black transition-all duration-200 relative after:absolute after:left-0 after:-bottom-1 after:w-0 hover:after:w-full after:h-1 after:bg-gray-700 after:rounded-full after:transition-all after:duration-500">Brands</a>
            </li>
        </ul>

        <!-- Search and Icons (desktop and mobile always shown) -->
        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Search for products..."
                    class="hidden md:block pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg animate__animated animate__fadeInRight"
                    data-aos="fade-left" />
                <!-- svg for desktop only; add hide-on-mobile -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 absolute top-2.5 left-3 text-gray-400 pointer-events-none hide-on-mobile" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                </svg>
            </div>
            <!-- Cart Icon -->
            <button
                class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
                data-aos="zoom-in">
                <i class="fa fa-shopping-cart text-xl"></i>
            </button>
            <!-- User Icon -->
            <button
                class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
                data-aos="zoom-in" data-aos-delay="200">
                <i class="fa fa-user text-xl"></i>
            </button>
        </div>

        <!-- Mobile Hamburger -->
        <button @click="open = !open" :aria-expanded="open ? 'true' : 'false'"
            class="block md:hidden p-2 rounded-full hover:bg-gray-100 transition-all duration-200"
            aria-label="Open menu">
            <svg x-show="!open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Dropdown Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-12" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-12" @click.away="open = false"
            class="fixed inset-0 top-16 bg-white z-50 flex flex-col gap-6 px-6 py-10 md:hidden animate__animated animate__fadeInDown"
            style="display: none;" x-cloak>
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
                <input type="text" placeholder="Search for products..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg" />
                <!-- svg only for md+ (hide on mobile) -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 absolute top-2.5 left-3 text-gray-400 pointer-events-none hide-on-mobile" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
                </svg>
            </div>
        </div>
        <!-- Alpine.js for state (you may need to add Alpine.js <script> in your layout for this to work) -->
    </nav>

    <!-- isi -->
    <main class="pt-32 px-4 md:px-12 lg:px-20 bg-white text-gray-800" data-aos="fade-up">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="lg:w-1/4 w-full border border-gray-200 rounded-2xl p-6 h-max">
                <h2 class="text-xl font-bold mb-6">Filters</h2>
                <div class="space-y-6">
                    <!-- Categories -->
                    <div>
                        <h3 class="font-semibold mb-3 text-gray-700">Category</h3>
                        <ul class="space-y-2 text-sm">
                            <li><label class="flex items-center gap-2"><input type="checkbox"> T-shirts</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Shorts</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Shirts</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Hoodie</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Jeans</label></li>
                        </ul>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <h3 class="font-semibold mb-3 text-gray-700">Price</h3>
                        <input type="range" min="50" max="200" value="100" class="w-full accent-black">
                        <div class="flex justify-between text-sm mt-2 text-gray-600">
                            <span>Rp50.000</span>
                            <span>Rp200.000</span>
                        </div>
                    </div>

                    <!-- Colors -->
                    <div>
                        <h3 class="font-semibold mb-3 text-gray-700">Colors</h3>
                        <div class="flex flex-wrap gap-3">
                            <span class="w-6 h-6 rounded-full bg-orange-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-yellow-400 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-green-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-blue-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-purple-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-pink-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 rounded-full bg-black border cursor-pointer"></span>
                        </div>
                    </div>

                    <!-- Size -->
                    <div>
                        <h3 class="font-semibold mb-3 text-gray-700">Size</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="border rounded-full px-4 py-1 text-sm">XS</button>
                            <button class="border rounded-full px-4 py-1 text-sm">S</button>
                            <button class="border rounded-full px-4 py-1 text-sm">M</button>
                            <button class="border rounded-full px-4 py-1 text-sm bg-black text-white">L</button>
                            <button class="border rounded-full px-4 py-1 text-sm">XL</button>
                        </div>
                    </div>

                    <!-- Dress Style -->
                    <div>
                        <h3 class="font-semibold mb-3 text-gray-700">Dress Style</h3>
                        <ul class="space-y-2 text-sm">
                            <li><label class="flex items-center gap-2"><input type="checkbox" checked> Casual</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Formal</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Party</label></li>
                            <li><label class="flex items-center gap-2"><input type="checkbox"> Gym</label></li>
                        </ul>
                    </div>

                    <!-- Apply Filter -->
                    <button class="mt-4 w-full bg-black text-white py-2 rounded-full font-semibold hover:scale-[1.02] transition">
                        Apply Filter
                    </button>
                </div>
            </aside>

            <!-- Products Section -->
            <section class="lg:w-3/4 w-full">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Casual</h2>
                    <p class="text-sm text-gray-500">Showing 1–10 of 100 Products | Sort by: <span class="font-semibold text-black">Most Popular</span></p>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product 1 -->
                    <a href="{{ url('product-detail') }}" class="block border rounded-2xl p-4 hover:shadow-lg transition cursor-pointer">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">ONE LIFE GRAPHIC T-SHIRT</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐☆☆ 3.5/5</p>
                        <p class="font-bold text-lg">Rp260.000.000</p>
                    </a>

                    <!-- Product 2 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Polo with Tipping Details</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐½ 4.8/5</p>
                        <p class="font-bold text-lg">Rp180.000</p>
                    </div>

                    <!-- Product 3 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Black Striped T-shirt</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐⭐ 5.0/5</p>
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">Rp120.000</p>
                            <p class="text-gray-400 line-through text-sm">Rp160.000</p>
                            <span class="text-red-500 text-sm font-semibold">-30%</span>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Skinny Fit Jeans</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐☆☆ 3.5/5</p>
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">Rp240.000</p>
                            <p class="text-gray-400 line-through text-sm">Rp260.000</p>
                            <span class="text-red-500 text-sm font-semibold">-20%</span>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Checkered Shirt</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐½ 4.5/5</p>
                        <p class="font-bold text-lg">Rp180.000</p>
                    </div>

                    <!-- Product 6 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Sleeve Striped T-shirt</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐ 4.0/5</p>
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">Rp130.000</p>
                            <p class="text-gray-400 line-through text-sm">Rp160.000</p>
                            <span class="text-red-500 text-sm font-semibold">-30%</span>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Vertical Striped Shirt</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐⭐ 5.0/5</p>
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">Rp212.000</p>
                            <p class="text-gray-400 line-through text-sm">Rp232.000</p>
                            <span class="text-red-500 text-sm font-semibold">-20%</span>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Courage Graphic T-shirt</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐⭐ 4.0/5</p>
                        <p class="font-bold text-lg">Rp145.000</p>
                    </div>

                    <!-- Product 9 -->
                    <div class="border rounded-2xl p-4 hover:shadow-lg transition">
                        <img src="image/baju.png" class="rounded-xl mb-3 w-full">
                        <h3 class="font-semibold">Loose Fit Bermuda Shorts</h3>
                        <p class="text-yellow-500 text-sm mb-1">⭐⭐⭐☆☆ 3.0/5</p>
                        <p class="font-bold text-lg">Rp80.000</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-10">
                    <button class="border px-4 py-2 rounded-full hover:bg-black hover:text-white transition">← Previous</button>
                    <div class="flex gap-2 text-sm">
                        <button class="bg-black text-white px-3 py-1 rounded-full">1</button>
                        <button class="border px-3 py-1 rounded-full">2</button>
                        <button class="border px-3 py-1 rounded-full">3</button>
                        <span class="px-2">...</span>
                        <button class="border px-3 py-1 rounded-full">10</button>
                    </div>
                    <button class="border px-4 py-2 rounded-full hover:bg-black hover:text-white transition">Next →</button>
                </div>
            </section>
        </div>
    </main>
    <!-- end isi -->

    <footer class="bg-[#f2f0f1] pt-12 pb-8 relative overflow-hidden" data-aos="fade-up">
        <!-- Newsletter Banner -->
        <div class="max-w-6xl mx-auto rounded-3xl p-6 sm:p-8 md:p-10 bg-black text-white flex flex-col lg:flex-row items-center justify-between gap-8 sm:gap-12 shadow-xl animate__animated animate__fadeInUp"
            data-aos="flip-down">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold leading-tight text-center lg:text-left">
                STAY UPTO DATE ABOUT <br class="hidden sm:block"> OUR LATEST OFFERS
            </h2>
            <form class="w-full max-w-md flex flex-col sm:flex-row items-center gap-4" autocomplete="off">
                <div class="relative w-full">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" placeholder="Enter your email address"
                        class="w-full pl-10 pr-4 py-3 rounded-full text-black placeholder-gray-500 focus:outline-none transition-shadow focus:shadow-xl"
                        required>
                </div>
                <button type="submit"
                    class="bg-white text-black font-semibold py-3 px-8 rounded-full w-full sm:w-auto transition transform hover:scale-105 shadow-md">
                    <i class="fa fa-paper-plane mr-2"></i>Subscribe to Newsletter
                </button>
            </form>
        </div>

        <!-- Main Footer -->
        <div class="max-w-6xl mx-auto mt-12 px-4 sm:px-6 animate__animated animate__fadeInUp" data-aos="fade-in"
            data-aos-delay="300">
            <div class="flex flex-col gap-10 lg:grid lg:grid-cols-5 lg:gap-8">
                <!-- Logo + Text -->
                <div class="lg:col-span-2 flex flex-col mb-8 lg:mb-0">
                    <h1 class="text-2xl sm:text-3xl font-black mb-4 ">SHOP.CO</h1>
                    <p class="text-gray-600 mb-6 max-w-md text-base sm:text-sm">
                        We have clothes that suit your <span class="font-semibold">style</span> and which you're proud
                        to wear.
                        From women to men.
                    </p>
                    <div class="flex gap-4 text-lg sm:text-xl text-gray-700 animate__animated animate__fadeInRight">
                        <a href="#" aria-label="Twitter" class="hover:scale-125 transition"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a href="#" aria-label="Facebook" class="hover:scale-125 transition"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a href="#" aria-label="Instagram" class="hover:scale-125 transition"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="GitHub" class="hover:scale-125 transition"><i
                                class="fa-brands fa-github"></i></a>
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
            <div
                class="flex flex-col md:flex-row justify-between items-center mt-10 text-gray-500 text-xs sm:text-sm gap-4 px-2 animate__animated animate__fadeIn animate__delay-2s">
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
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.counter').forEach((counter) => {
                let target = +counter.dataset.count;
                let count = 0;
                let plus = Math.ceil(target / 60);
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
            for (let i = 0; i < 18; i++) {
                let top = Math.random() * 90;
                let left = Math.random() * 98;
                let size = 1 + Math.random() * 2;
                s += `<div style='position:absolute;top:${top}%;left:${left}%;background:white;opacity:0.7;border-radius:100%;width:${size + 2}px;height:${size + 2}px;'></div>`;
            }
            document.querySelector('.star-bg').innerHTML = s;
        }
    </script>
</body>

</html>