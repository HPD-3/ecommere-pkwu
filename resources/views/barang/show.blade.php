<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script defer src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif;}
    body { background: #fff; color: #111; }
    a { text-decoration: none; color: inherit; }
    .container { padding: 2rem 4rem;}
    .breadcrumb { color: #777; font-size: 0.9rem; margin-bottom: 1rem;}
    .product-detail { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;}
    .gallery { display: flex; gap: 1rem;}
    .main-img img { width: 100%; border-radius: 12px;}
    .info h1 { font-size: 1.8rem; margin-bottom: 0.5rem;}
    .stars { color: gold; margin-bottom: 0.5rem;}
    .price { font-size: 1.5rem; font-weight: 700; margin: 0.5rem 0;}
    .old { color: #999; text-decoration: line-through; margin-left: 0.5rem; font-weight: 400;}
    .desc { color: #555; line-height: 1.5; margin-bottom: 1rem;}
    .size { margin: 1rem 0;}
    .size span { display: inline-block; border: 1px solid #e2e8f0; border-radius: 6px; padding: 0.4rem 0.8rem; margin-right: 0.5rem; cursor: pointer;}
    .size span:hover { background: #111; color: #fff;}
    .qty { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;}
    .qty button { padding: 0.4rem 0.8rem; border: 1px solid #e2e8f0; background: #fff; cursor: pointer; font-weight: 700; border-radius: 6px;}
    .qty input { width: 40px; text-align: center; border: 1px solid #e2e8f0; border-radius: 6px;}
    .btn-cart { padding: 0.75rem 1.5rem; background: #000; color: #fff; font-weight: 600; border: none; border-radius: 8px; cursor: pointer;}
    .btn-cart:hover { background: #222;}
    .tabs { display: flex; gap: 2rem; margin: 3rem 0 1rem; border-bottom: 1px solid #e2e8f0;}
    .tabs div { padding-bottom: 0.5rem; cursor: pointer; font-weight: 600;}
    .tabs .active { border-bottom: 2px solid #111;}
    @media(max-width:768px) {
      .product-detail { grid-template-columns: 1fr;}
      header { padding: 1rem 2rem;}
      .container { padding: 1.5rem;}
    }
    .navbar-blur {backdrop-filter: blur(8px); background: rgba(255,255,255,0.92);}
    @media (max-width: 767px) {
      .navbar-blur-forced {backdrop-filter: blur(8px) !important; background: white !important;}
      .hide-on-mobile { display: none !important;}
    }
    @media (min-width: 768px) {
      .show-on-mobile { display: none !important;}
    }
  </style>
</head>
<body>
  <header>
    <nav x-data="{ open: false }"
        :class="open ? 'navbar-blur-forced' : 'navbar-blur'"
        class="flex items-center justify-between px-4 md:px-8 py-4 bg-white shadow-sm fixed w-full top-0 left-0 z-40 animate__animated animate__fadeInDown animate__faster"
        data-aos="fade-down" data-aos-delay="200">
      <div class="text-2xl font-extrabold tracking-tight">SHOP.CO</div>
      <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
        <li><a href="/" class="hover:text-black transition">Shop</a></li>
        <li><a href="#" class="hover:text-black transition">On Sale</a></li>
        <li><a href="#" class="hover:text-black transition">New Arrivals</a></li>
        <li><a href="#" class="hover:text-black transition">Brands</a></li>
      </ul>
      <div class="flex items-center gap-4">
        <div class="relative">
          <input type="text" placeholder="Search for products..."
            class="hidden md:block pl-10 pr-4 py-2 border border-gray-200 rounded-full focus:ring-2 focus:ring-black focus:outline-none text-sm transition-all duration-300 focus:shadow-lg animate__animated animate__fadeInRight"
            data-aos="fade-left" />
          <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 absolute top-2.5 left-3 text-gray-400 pointer-events-none hide-on-mobile" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
          </svg>
        </div>
        <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
          data-aos="zoom-in">
          <i class="fa fa-shopping-cart text-xl"></i>
        </button>
        <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
          data-aos="zoom-in" data-aos-delay="200">
          <i class="fa fa-user text-xl"></i>
        </button>
      </div>
    </nav>
  </header>

  <main class="mt-20 flex flex-col md:flex-row items-center justify-between px-8 md:px-16 py-28 bg-[#f2f0f1] relative overflow-hidden" style="margin-top:64px;">
    <div class="container max-w-6xl mx-auto mt-6 mb-16 bg-white/90 rounded-2xl shadow-xl px-2 sm:px-6 py-8 md:py-12">
      <!-- Breadcrumb with link support -->
      <nav class="mb-5 flex items-center text-sm text-gray-500 gap-1">
        <a href="{{ url('/') }}" class="hover:underline hover:text-black focus:outline-none focus:ring-2 focus:ring-black rounded">Shop</a>
        <span class="mx-1 text-gray-400">›</span>
        @if(isset($product->category->name))
          <a href="#" class="hover:underline hover:text-black focus:outline-none focus:ring-2 focus:ring-black rounded">{{ $product->category->name }}</a>
        @else
          <span>-</span>
        @endif
      </nav>

      <div class="product-detail grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-14 items-start">
        {{-- GAMBAR UTAMA PRODUK --}}
        @php
            use Illuminate\Support\Str;

            $imageSrc = '';
            if (is_string($product->image) && Str::startsWith($product->image, ['http://', 'https://'])) {
                $imageSrc = $product->image;
            } elseif (is_string($product->image) && file_exists(public_path('storage/' . $product->image))) {
                $imageSrc = asset('storage/' . $product->image);
            } elseif (is_string($product->image) && file_exists(public_path($product->image))) {
                $imageSrc = asset($product->image);
            } elseif (!empty($product->image)) {
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($product->image);
            } else {
                $imageSrc = 'https://ui-avatars.com/api/?name='.urlencode($product->name).'&background=ddd&color=444&size=256';
            }
        @endphp

        <!-- Product Gallery with lightbox hover (UI improvement) -->
        <div class="gallery flex flex-col gap-4 sticky top-28">
          <div class="main-img aspect-square bg-gray-100 flex items-center justify-center overflow-hidden rounded-xl shadow group">
            <img 
              src="{{ $imageSrc }}" 
              alt="{{ $product->name }}" 
              class="w-full h-full object-cover rounded-xl transition-transform duration-150 group-hover:scale-110"
              loading="lazy"
              onerror="this.src='https://via.placeholder.com/500x500?text=No+Image';"
              style="max-height:430px;max-width:100%;"
            >
            <!-- Magnifier icon overlay -->
            <span class="absolute bottom-4 right-4 bg-white/80 rounded-full p-1.5 text-lg drop-shadow hidden group-hover:block transition"><i class="fa fa-search"></i></span>
          </div>
        </div>

        <!-- PRODUCT INFO CARD -->
        <div class="info relative bg-white/90 p-0 md:p-8 rounded-2xl">
          <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">{{ $product->name }}</h1>

          <!-- STAR RATING -->
          <div class="stars flex items-center mb-3 text-yellow-400 gap-1 text-lg">
            @php $stars = floor($product->rating ?? 4); @endphp
            @for($i = 0; $i < $stars; $i++)
              <i class="fa fa-star"></i>
            @endfor
            @if(($product->rating ?? 4.5) - $stars >= 0.5)
              <i class="fa fa-star-half-alt"></i>
            @endif
            <span class="text-gray-500 text-sm ml-2">
              ({{ number_format($product->rating ?? 4.5, 1) }}/5)
            </span>
          </div>

          <!-- PRICING -->
          <div class="price flex items-center space-x-3 mb-2">
            <span class="text-2xl md:text-3xl font-bold text-black">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
            @if($product->old_price)
              <span class="old text-lg text-gray-400 line-through">Rp{{ number_format($product->old_price, 0, ',', '.') }}</span>
              <span class="text-sm text-green-600 font-semibold">
                -{{ round((($product->old_price - $product->price)/$product->old_price)*100) }}%
              </span>
            @endif
          </div>

          <!-- DESCRIPTION -->
          <p class="desc text-gray-700 mb-6 text-base leading-relaxed">
            {{ $product->description ?? 'No description available.' }}
          </p>

          <!-- PRODUCT OPTIONS: SIZE & COLOR -->
          <div class="flex flex-col sm:flex-row gap-6 sm:gap-10 mb-5">

            <!-- Size Selector, using radio buttons if multiple -->
            <div class="size flex flex-col gap-1">
              <span class="font-semibold text-gray-900">Size:</span>
              @if(!empty($product->sizes) && is_array($product->sizes))
                <div class="flex flex-row gap-2 mt-1">
                  @foreach($product->sizes as $size)
                    <label class="cursor-pointer">
                      <input type="radio" name="size" value="{{ $size }}" class="peer hidden" @if($loop->first) checked @endif disabled>
                      <span class="px-3 py-1.5 rounded-full bg-gray-200 text-xs font-medium peer-checked:bg-black peer-checked:text-white peer-disabled:opacity-90">
                        {{ $size }}
                      </span>
                    </label>
                  @endforeach
                </div>
              @elseif(!empty($product->size))
                <span class="inline-block px-3 py-1.5 rounded-full bg-gray-200 text-xs font-medium mt-1">{{ $product->size }}</span>
              @else
                <span class="inline-block px-3 py-1.5 rounded-full bg-gray-100 text-gray-400 text-xs font-medium mt-1">All Size</span>
              @endif
            </div>

            <!-- Color Selector as color dots -->
            <div class="color flex flex-col gap-1">
              <span class="font-semibold text-gray-900">Color:</span>
              @php
                $colors = [];
                if (!empty($product->colors) && is_array($product->colors)) {
                  $colors = $product->colors;
                } elseif (!empty($product->color)) {
                  if (is_array($product->color)) {
                    $colors = $product->color;
                  } else {
                    $colors = array_map('trim', explode(',', $product->color));
                  }
                }
              @endphp
              @if(!empty($colors))
                <div class="flex flex-row flex-wrap items-center gap-2 mt-1">
                  @foreach($colors as $clr)
                    @php
                      $clrTrimmed = trim($clr);
                      $isValidCssColor = preg_match('/^#([A-Fa-f0-9]{3,8})$/', $clrTrimmed) ||
                                         preg_match('/^rgba?\(/i', $clrTrimmed) ||
                                         preg_match('/^[a-z ]+$/i', $clrTrimmed);
                    @endphp
                    <span class="flex items-center gap-1">
                      @if($isValidCssColor)
                        <span title="{{ $clrTrimmed }}"
                          style="background: {{ $clrTrimmed }};"
                          class="inline-block w-6 h-6 rounded-full border shadow border-gray-300 align-middle"></span>
                      @endif
                      <span class="text-xs font-medium text-gray-700">
                        {{ $clrTrimmed }}
                      </span>
                    </span>
                  @endforeach
                </div>
              @else
                <span class="inline-block px-3 py-1.5 rounded-full bg-gray-100 text-gray-400 text-xs font-medium mt-2">-</span>
              @endif
            </div>
          </div>

          <!-- SKU, Brand, Category -->
          <ul class="flex flex-row flex-wrap gap-x-8 gap-y-2 mb-6 text-xs text-gray-600 font-medium">
            <li>
              <span class="uppercase text-gray-400">SKU:</span>
              <span class="text-gray-700">{{ $product->sku ?? 'N/A' }}</span>
            </li>
            @if($product->brand?->name)
            <li>
              <span class="uppercase text-gray-400">Brand:</span>
              <span class="text-gray-700">{{ $product->brand->name }}</span>
            </li>
            @endif
            @if($product->category?->name)
            <li>
              <span class="uppercase text-gray-400">Category:</span>
              <span class="text-gray-700">{{ $product->category->name }}</span>
            </li>
            @endif
          </ul>

          <!-- Add to Cart -->
          <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex flex-col gap-3">
              @csrf
              <div class="qty flex items-center gap-3">
                <span class="font-semibold text-gray-700">Qty:</span>
                <button type="button"
                        class="w-9 h-9 rounded-full border bg-white text-black text-lg font-bold hover:bg-gray-100 transition active:scale-95"
                        aria-label="Decrease quantity"
                        onclick="var qty = this.parentNode.querySelector('input[name=qty]'); qty.value = Math.max(1, (parseInt(qty.value)||1) - 1);">-</button>
                <input 
                  type="number" 
                  name="qty" 
                  value="1" 
                  min="1" 
                  class="w-16 text-center border rounded border-gray-300 py-2 focus:ring-2 focus:ring-black"
                  style="width:64px"
                  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, '') || 1"
                  required
                  aria-label="Quantity"
                >
                <button type="button"
                        class="w-9 h-9 rounded-full border bg-white text-black text-lg font-bold hover:bg-gray-100 transition active:scale-95"
                        aria-label="Increase quantity"
                        onclick="var qty = this.parentNode.querySelector('input[name=qty]'); qty.value = (parseInt(qty.value)||1) + 1;">+</button>
              </div>
              <button 
                class="btn-cart mt-4 bg-black text-white font-semibold py-3 rounded-lg text-base shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black transition w-full md:w-auto"
                type="submit"
              >
                <i class="fa fa-cart-plus mr-2"></i>Add to Cart
              </button>
          </form>
        </div>
      </div>
    </div>

  </main>

  <footer class="bg-[#f2f0f1] pt-12 pb-8 relative overflow-hidden" data-aos="fade-up">
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
      <div class="max-w-6xl mx-auto mt-12 px-4 sm:px-6 animate__animated animate__fadeInUp" data-aos="fade-in"
        data-aos-delay="300">
        <div class="flex flex-col gap-10 lg:grid lg:grid-cols-5 lg:gap-8">
          <div class="lg:col-span-2 flex flex-col mb-8 lg:mb-0">
            <h1 class="text-2xl sm:text-3xl font-black mb-4 ">SHOP.CO</h1>
            <p class="text-gray-600 mb-6 max-w-md text-base sm:text-sm">
              We have clothes that suit your <span class="font-semibold">style</span> and which you're proud to wear.
              From women to men.
            </p>
            <div class="flex gap-4 text-lg sm:text-xl text-gray-700">
              <a href="#" class="hover:scale-125 transition"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="hover:scale-125 transition"><i class="fa-brands fa-facebook"></i></a>
              <a href="#" class="hover:scale-125 transition"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="hover:scale-125 transition"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
          <div class="mb-8 lg:mb-0 text-center lg:text-left">
            <h3 class="font-bold mb-4 text-base">COMPANY</h3>
            <ul class="space-y-2 text-gray-600 text-sm">
              <li><a href="#" class="hover:text-black transition">About</a></li>
              <li><a href="#" class="hover:text-black transition">Features</a></li>
              <li><a href="#" class="hover:text-black transition">Works</a></li>
              <li><a href="#" class="hover:text-black transition">Career</a></li>
            </ul>
          </div>
          <div class="mb-8 lg:mb-0 text-center lg:text-left">
            <h3 class="font-bold mb-4 text-base">HELP</h3>
            <ul class="space-y-2 text-gray-600 text-sm">
              <li><a href="#" class="hover:text-black transition">Customer Support</a></li>
              <li><a href="#" class="hover:text-black transition">Delivery Details</a></li>
              <li><a href="#" class="hover:text-black transition">Terms & Conditions</a></li>
              <li><a href="#" class="hover:text-black transition">Privacy Policy</a></li>
            </ul>
          </div>
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
        <div class="flex flex-col md:flex-row justify-between items-center mt-10 text-gray-500 text-xs sm:text-sm gap-4 px-2">
          <p>Shop.co © 2025-2026, All Rights Reserved</p>
        </div>
      </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 900, once: false });
    </script>
</body>
</html>
