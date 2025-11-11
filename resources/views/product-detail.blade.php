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
  <!-- Fix for font import -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #fff;
      color: #111;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .container {
      padding: 2rem 4rem;
    }

    .breadcrumb {
      color: #777;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }

    .product-detail {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    .gallery {
      display: flex;
      gap: 1rem;
    }

    .thumbs {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .thumbs img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      cursor: pointer;
    }

    .main-img img {
      width: 100%;
      border-radius: 12px;
    }

    .info h1 {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }

    .stars {
      color: gold;
      margin-bottom: 0.5rem;
    }

    .price {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0.5rem 0;
    }

    .old {
      color: #999;
      text-decoration: line-through;
      margin-left: 0.5rem;
      font-weight: 400;
    }

    .desc {
      color: #555;
      line-height: 1.5;
      margin-bottom: 1rem;
    }

    .size {
      margin: 1rem 0;
    }

    .size span {
      display: inline-block;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      padding: 0.4rem 0.8rem;
      margin-right: 0.5rem;
      cursor: pointer;
    }

    .size span:hover {
      background: #111;
      color: #fff;
    }

    .qty {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .qty button {
      padding: 0.4rem 0.8rem;
      border: 1px solid #e2e8f0;
      background: #fff;
      cursor: pointer;
      font-weight: 700;
      border-radius: 6px;
    }

    .qty input {
      width: 40px;
      text-align: center;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
    }

    .btn-cart {
      padding: 0.75rem 1.5rem;
      background: #000;
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .btn-cart:hover {
      background: #222;
    }

    /* ===== TABS ===== */
    .tabs {
      display: flex;
      gap: 2rem;
      margin: 3rem 0 1rem;
      border-bottom: 1px solid #e2e8f0;
    }

    .tabs div {
      padding-bottom: 0.5rem;
      cursor: pointer;
      font-weight: 600;
    }

    .tabs .active {
      border-bottom: 2px solid #111;
    }

    .reviews {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1rem;
      margin-top: 2rem;
    }

    .review {
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 1rem;
    }

    .review .stars {
      margin-bottom: 0.5rem;
    }

    .review strong {
      display: block;
      margin-top: 0.5rem;
    }

    .review small {
      color: #777;
      font-size: 0.8rem;
    }

    .load-btn {
      display: block;
      margin: 2rem auto;
      padding: 0.75rem 1.5rem;
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      cursor: pointer;
    }

    .load-btn:hover {
      background: #f5f5f5;
    }

    /* ===== RECOMMENDED ===== */
    .recommend {
      background: #f9fafb;
      border-radius: 10px;
      padding: 2rem;
      margin-top: 3rem;
    }

    .recommend h2 {
      text-align: center;
      margin-bottom: 2rem;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1.5rem;
    }

    .product {
      text-align: center;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 1rem;
    }

    .product img {
      width: 150px;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 0.5rem;
    }

    .product h3 {
      font-size: 1rem;
      margin-bottom: 0.25rem;
    }

    .product .price {
      font-weight: 600;
    }

    .product .old {
      color: #999;
      text-decoration: line-through;
      margin-left: 0.25rem;
    }

    @media(max-width:768px) {
      .product-detail {
        grid-template-columns: 1fr;
      }
      header {
        padding: 1rem 2rem;
      }
      .container {
        padding: 1.5rem;
      }
    }
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

<body>
  <!-- Navbar, now matches 1:1 with prompt's desired functionality -->
  <header>
    <nav x-data="{ open: false }"
        :class="open ? 'navbar-blur-forced' : 'navbar-blur'"
        class="flex items-center justify-between px-4 md:px-8 py-4 bg-white shadow-sm fixed w-full top-0 left-0 z-40 animate__animated animate__fadeInDown animate__faster"
        data-aos="fade-down" data-aos-delay="200">
      <!-- Logo -->
      <div class="text-2xl font-extrabold tracking-tight">SHOP.CO</div>
      <!-- Desktop Menu -->
      <ul class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
        <li><a href="#"
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
        <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
          data-aos="zoom-in">
          <i class="fa fa-shopping-cart text-xl"></i>
        </button>
        <!-- User Icon -->
        <button class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 animate__animated animate__fadeIn"
          data-aos="zoom-in" data-aos-delay="200">
          <i class="fa fa-user text-xl"></i>
        </button>
      </div>
      <!-- Mobile Hamburger -->
      <button @click="open = !open" :aria-expanded="open ? 'true' : 'false'"
        class="block md:hidden p-2 rounded-full hover:bg-gray-100 transition-all duration-200" aria-label="Open menu">
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
      <!-- Alpine.js for state -->
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="breadcrumb">Shop / T-Shirts</div>
      <div class="product-detail">
        <div class="gallery">
          <div class="thumbs">
            <img src="{{ asset('image/baju.png') }}" alt="Nama Produk">
            <img src="{{ asset('image/baju.png') }}" alt="Nama Produk">
            <img src="{{ asset('image/baju.png') }}" alt="Nama Produk">
          </div>
          <div class="main-img">
            <img src="{{ asset('image/baju.png') }}" alt="">
          </div>
        </div>
        <div class="info">
          <h1>ONE LIFE GRAPHIC T-SHIRT</h1>
          <div class="stars">★★★★☆ (4.5/5)</div>
          <div class="price">Rp260.000.000 <span class="old">Rp700.000.000</span></div>
          <p class="desc">This stylish graphic t-shirt is made from premium cotton for comfort and durability. Crafted to
            last and perfect for your everyday look.</p>
          <div class="size">
            <p>Size:</p>
            <span>Small</span><span>Medium</span><span>Large</span><span>X-Large</span>
          </div>
          <div class="qty">
            <button type="button">-</button>
            <input type="text" value="1">
            <button type="button">+</button>
          </div>
          <button class="btn-cart">Add to Cart</button>
        </div>
      </div>

      <div class="tabs">
        <div class="active">Product Details</div>
        <div>Rating & Reviews</div>
        <div>FAQs</div>
      </div>

      <div class="reviews">
        <div class="review">
          <div class="stars">★★★★★</div>
          <p>"Absolutely love this design, it looks fresh and the fabric feels nice!"</p>
          <strong>Samantha Q</strong>
          <small>Posted on August 8, 2025</small>
        </div>
        <div class="review">
          <div class="stars">★★★★★</div>
          <p>"The color is amazing and the fit is perfect. Great value for money!"</p>
          <strong>Alex M</strong>
          <small>Posted on August 5, 2025</small>
        </div>
        <div class="review">
          <div class="stars">★★★★☆</div>
          <p>"Comfortable and good quality. Would definitely recommend."</p>
          <strong>Ethan R</strong>
          <small>Posted on August 4, 2025</small>
        </div>
        <div class="review">
          <div class="stars">★★★★☆</div>
          <p>"Nice texture and very comfy material. The color matches the picture."</p>
          <strong>Olivia P</strong>
          <small>Posted on August 3, 2025</small>
        </div>
      </div>

      <button class="load-btn">Load More Reviews</button>

      <div class="recommend">
        <h2>YOU MIGHT ALSO LIKE</h2>
        <div class="grid">
          <div class="product">
            <img src="{{ asset('image/biru.png') }}" alt="">
            <h3>Polo with Contrast Trims</h3>
            <div class="price">212.000 <span class="old">$242</span></div>
          </div>
          <div class="product">
            <img src="{{ asset('image/garisptih.png') }}" alt="">
            <h3>Gradient Graphic T-shirt</h3>
            <div class="price">145.000</div>
          </div>
          <div class="product">
            <img src="{{ asset('image/pink.png') }}" alt="">
            <h3>Polo with Typing Details</h3>
            <div class="price">180.000</div>
          </div>
          <div class="product">
            <img src="{{ asset('image/putihungu.png') }}" alt="">
            <h3>Black Striped T-shirt</h3>
            <div class="price">120.000 <span class="old">$150</span></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-[#f2f0f1] pt-12 pb-8 relative overflow-hidden" data-aos="fade-up">
      <!-- Newsletter Banner -->
      <div
        class="max-w-6xl mx-auto rounded-3xl p-6 sm:p-8 md:p-10 bg-black text-white flex flex-col lg:flex-row items-center justify-between gap-8 sm:gap-12 shadow-xl animate__animated animate__fadeInUp"
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
              We have clothes that suit your <span class="font-semibold">style</span> and which you're proud to wear.
              From women to men.
            </p>
            <div class="flex gap-4 text-lg sm:text-xl text-gray-700 animate__animated animate__fadeInRight">
              <a href="#" aria-label="Twitter" class="hover:scale-125 transition"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" aria-label="Facebook" class="hover:scale-125 transition"><i
                  class="fa-brands fa-facebook"></i></a>
              <a href="#" aria-label="Instagram" class="hover:scale-125 transition"><i
                  class="fa-brands fa-instagram"></i></a>
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
        <div
          class="flex flex-col md:flex-row justify-between items-center mt-10 text-gray-500 text-xs sm:text-sm gap-4 px-2 animate__animated animate__fadeIn animate__delay-2s">
          <p class="text-center md:text-left">
            Shop.co © 2025-2026, All Rights Reserved
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