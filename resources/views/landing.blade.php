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
        .navbar-blur { backdrop-filter: blur(8px); background: rgba(255,255,255,0.92);}
        @media (max-width: 767px) {
            .navbar-blur-forced {backdrop-filter: blur(8px) !important; background: white !important;}
        }
        @media (max-width: 767px) { .hide-on-mobile { display: none !important; } }
        @media (min-width: 768px) { .show-on-mobile { display: none !important; } }
        @media (max-width: 768px) {
            .mobile-menu-colored {
                background: rgba(255,255,255,0.98) !important;
                backdrop-filter: blur(12px) !important;
                -webkit-backdrop-filter: blur(12px) !important;
                box-shadow: 0 4px 32px 0 rgba(0,0,0,0.10) !important;
                min-height: 100vh !important;
                display: flex !important;
                flex-direction: column !important;
                justify-content: flex-start !important;
                align-items: stretch !important;
                width: 100vw !important;
                left: 0 !important;
                right: 0 !important;
                position: fixed !important;
            }
        }
    </style>
</head>

<body class="overflow-x-hidden">
    <!-- Navbar -->
    @include('partials.navbar')
    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between px-8 md:px-16 py-28 bg-[#f2f0f1] relative overflow-hidden" style="margin-top:64px;">
        <div class="absolute w-[320px] h-[320px] rounded-full bg-[#f2f0f1] blur-3xl opacity-60 left-[-120px] top-0 animate-[bounce_5s_infinite]"></div>
        <div class="absolute w-[180px] h-[180px] rounded-full bg-white blur-2xl opacity-50 right-[-60px] bottom-12 animate-[pulse_8s_infinite]"></div>
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

    <!-- Section showing barang/products dynamically -->
    <section class="py-16 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold tracking-tight mb-6 animate__animated animate__jackInTheBox">OUR PRODUCTS</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @php use Illuminate\Support\Str; @endphp

                    @forelse($products as $barang)
                        @php
                            $imgSrc = '';

                            if (!empty($barang->image)) {
                                if (is_string($barang->image) && Str::startsWith($barang->image, ['http://', 'https://'])) {
                                    // Jika gambar adalah URL
                                    $imgSrc = $barang->image;
                                } elseif (is_string($barang->image) && file_exists(public_path('storage/' . $barang->image))) {
                                    // Jika gambar ada di storage
                                    $imgSrc = asset('storage/' . $barang->image);
                                } elseif (is_string($barang->image) && file_exists(public_path($barang->image))) {
                                    // Jika gambar ada di public/
                                    $imgSrc = asset($barang->image);
                                } elseif (is_string($barang->image)) {
                                    // Jika data mungkin berupa binary string dari database (BLOB)
                                    $mime = 'image/jpeg';
                                    $base64 = base64_encode($barang->image);
                                    $imgSrc = 'data:' . $mime . ';base64,' . $base64;
                                } else {
                                    // Jika semua gagal
                                    $imgSrc = 'https://via.placeholder.com/300x300?text=No+Image';
                                }
                            } else {
                                // Jika kolom image kosong
                                $imgSrc = 'https://via.placeholder.com/300x300?text=No+Image';
                            }
                        @endphp

                        <a href="{{ url('barang/'.$barang->id) }}" 
                           class="block bg-white rounded-xl shadow-lg p-4 hover:shadow-2xl transition-transform transform hover:-translate-y-2 group animate__animated animate__fadeInUp" 
                           data-aos="flip-left">

                            <div class="w-full aspect-square mb-3 mx-auto overflow-hidden rounded-lg flex items-center justify-center bg-gray-100">
                                <img src="{{ $imgSrc }}" 
                                     alt="{{ $barang->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/300x300?text=No+Image';">
                            </div>

                            <h3 class="text-sm font-medium text-gray-800">{{ $barang->name }}</h3>

                            @if(!empty($barang->price))
                                <p class="text-lg font-bold mt-2 animate__animated animate__bounce">
                                    Rp{{ number_format($barang->price, 0, ',', '.') }}
                                </p>
                            @endif

                            @if(!empty($barang->category?->name))
                                <span class="inline-block mt-1 py-0.5 px-2 bg-gray-100 text-xs rounded text-gray-600">
                                    {{ $barang->category->name }}
                                </span>
                            @endif
                        </a>
                    @empty
                        <div class="col-span-4 text-center text-gray-400">No products found.</div>
                    @endforelse
                </div>
                
                <a href="/barang">
                    <button
                        class="mt-8 px-6 py-2 bg-white rounded-full hover:bg-gray-800 transition hover:text-white border border-gray-200 focus:ring-1 focus:ring-black focus:outline-none shadow-md transition-all duration-300 scale-105"
                        data-aos="zoom-in" data-aos-delay="200">
                        <i class="fa fa-caret-right mr-2"></i>View All
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- BROWSE BY DRESS STYLE section -->
    <section class="py-16 relative overflow-visible bg-[#f2f0f1]">
        <div class="max-w-5xl mx-auto bg-white rounded-3xl p-10 shadow-md relative animate__animated animate__fadeInUp" data-aos="zoom-in-up">
            <h2 class="text-center text-2xl font-extrabold tracking-wide mb-10 animate__animated animate__pulse animate__infinite">
                BROWSE BY DRESS STYLE
            </h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-right" data-aos-delay="50">
                    <img src="{{ asset('photos/casual.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Casual">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Casual</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Daily Favorite</span>
                </div>
                <div class="col-span-2 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-left" data-aos-delay="100">
                    <img src="{{ asset('photos/formal.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Formal">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Formal</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Elegant Style</span>
                </div>
                <div class="col-span-2 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-left" data-aos-delay="150">
                    <img src="{{ asset('photos/gym.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Gym">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Gym</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Sport Spirit</span>
                </div>
                <div class="col-span-1 relative rounded-xl overflow-hidden aspect-4/3 bg-gray-200 group" data-aos="zoom-in-right" data-aos-delay="200">
                    <img src="{{ asset('photos/party.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="party">
                    <span class="absolute top-3 left-3 bg-white/80 px-3 py-1 rounded-md text-sm font-semibold backdrop-blur text-gray-900 animate__animated animate__fadeInDown">Party</span>
                    <span class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs text-gray-700 opacity-80 shadow hidden group-hover:block animate__animated animate__fadeInLeft">Let's Celebrate</span>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footers')
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