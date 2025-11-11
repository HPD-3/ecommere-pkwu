<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop.CO - Product Detail</title>
  <style>
    * {margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
    body {background:#fff;color:#111;}
    a {text-decoration:none;color:inherit;}

   /* Navbar container */
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 32px;
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

/* Logo */
.logo {
  font-size: 1.5rem;
  font-weight: 800;
  letter-spacing: -0.02em;
}

/* Menu */
.menu {
  display: flex;
  align-items: center;
  gap: 32px;
  list-style: none;
}

.menu a {
  text-decoration: none;
  color: #555;
  font-weight: 500;
  transition: color 0.2s;
}

.menu a:hover {
  color: #000;
}

/* Search + Icons container */
.nav-icons {
  display: flex;
  align-items: center;
  gap: 16px;
}

/* Search input */
.search-container {
  position: relative;
}

.search-input {
  display: none;
}

@media (min-width: 768px) {
  .search-input {
    display: block;
    padding: 8px 16px 8px 36px;
    border: 1px solid #ddd;
    border-radius: 9999px;
    font-size: 0.875rem;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
  }

  .search-input:focus {
    border-color: #000;
    box-shadow: 0 0 0 1px #000;
  }
}

/* Search icon */
.search-icon {
  width: 20px;
  height: 20px;
  position: absolute;
  top: 8px;
  left: 12px;
  color: #999;
}

/* Buttons (cart, user) */
.icon-btn {
  padding: 8px;
  border: none;
  background: none;
  border-radius: 50%;
  cursor: pointer;
  transition: background 0.2s;
}

.icon-btn:hover {
  background-color: #f3f3f3;
}

.icon {
  width: 20px;
  height: 20px;
  stroke: #333;
}


    /* ===== CONTAINER ===== */
    .container{padding:2rem 4rem;}
    .breadcrumb{color:#777;font-size:0.9rem;margin-bottom:1rem;}
    .product-detail{display:grid;grid-template-columns:1fr 1fr;gap:2rem;}
    .gallery{display:flex;gap:1rem;}
    .thumbs{display:flex;flex-direction:column;gap:1rem;}
    .thumbs img{width:70px;height:70px;object-fit:cover;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;}
    .main-img img{width:100%;border-radius:12px;}
    .info h1{font-size:1.8rem;margin-bottom:0.5rem;}
    .stars{color:gold;margin-bottom:0.5rem;}
    .price{font-size:1.5rem;font-weight:700;margin:0.5rem 0;}
    .old{color:#999;text-decoration:line-through;margin-left:0.5rem;font-weight:400;}
    .desc{color:#555;line-height:1.5;margin-bottom:1rem;}
    .size{margin:1rem 0;}
    .size span{display:inline-block;border:1px solid #e2e8f0;border-radius:6px;padding:0.4rem 0.8rem;margin-right:0.5rem;cursor:pointer;}
    .size span:hover{background:#111;color:#fff;}
    .qty{display:flex;align-items:center;gap:1rem;margin-bottom:1rem;}
    .qty button{padding:0.4rem 0.8rem;border:1px solid #e2e8f0;background:#fff;cursor:pointer;font-weight:700;border-radius:6px;}
    .qty input{width:40px;text-align:center;border:1px solid #e2e8f0;border-radius:6px;}
    .btn-cart{padding:0.75rem 1.5rem;background:#000;color:#fff;font-weight:600;border:none;border-radius:8px;cursor:pointer;}
    .btn-cart:hover{background:#222;}

    /* ===== TABS ===== */
    .tabs{display:flex;gap:2rem;margin:3rem 0 1rem;border-bottom:1px solid #e2e8f0;}
    .tabs div{padding-bottom:0.5rem;cursor:pointer;font-weight:600;}
    .tabs .active{border-bottom:2px solid #111;}
    .reviews{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1rem;margin-top:2rem;}
    .review{border:1px solid #e2e8f0;border-radius:10px;padding:1rem;}
    .review .stars{margin-bottom:0.5rem;}
    .review strong{display:block;margin-top:0.5rem;}
    .review small{color:#777;font-size:0.8rem;}

    .load-btn{display:block;margin:2rem auto;padding:0.75rem 1.5rem;background:#fff;border:1px solid #e2e8f0;border-radius:6px;cursor:pointer;}
    .load-btn:hover{background:#f5f5f5;}

    /* ===== RECOMMENDED ===== */
    .recommend{background:#f9fafb;border-radius:10px;padding:2rem;margin-top:3rem;}
    .recommend h2{text-align:center;margin-bottom:2rem;}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.5rem;}
    .product{text-align:center;border:1px solid #e2e8f0;border-radius:10px;padding:1rem;}
    .product img{width:150px;height:180px;object-fit:cover;border-radius:8px;margin-bottom:0.5rem;}
    .product h3{font-size:1rem;margin-bottom:0.25rem;}
    .product .price{font-weight:600;}
    .product .old{color:#999;text-decoration:line-through;margin-left:0.25rem;}

    /* ===== SUBSCRIBE ===== */
    .subscribe{background:#111;color:#fff;border-radius:10px;padding:2rem;margin-top:3rem;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;}
    .subscribe h3{font-size:1.2rem;}
    .subscribe input{padding:0.75rem 1rem;border-radius:6px;border:none;width:250px;}
    .subscribe button{padding:0.75rem 1.5rem;border:none;background:#fff;color:#000;font-weight:600;border-radius:6px;cursor:pointer;}

    /* ===== FOOTER ===== */
    footer{background:#f8f9fa;padding:2rem 4rem;margin-top:3rem;}
    footer .footer-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.5rem;}
    footer h4{margin-bottom:1rem;}
    footer a{display:block;margin-bottom:0.5rem;color:#333;font-size:0.9rem;}
    footer a:hover{color:#000;}
    footer .bottom{text-align:center;margin-top:2rem;color:#777;font-size:0.85rem;}

    @media(max-width:768px){
      .product-detail{grid-template-columns:1fr;}
      header{padding:1rem 2rem;}
      .container{padding:1.5rem;}
    }
  </style>
</head>
<body>

<header>
 <nav class="navbar">
  <!-- Logo -->
  <div class="logo">SHOP.CO</div>

  <!-- Menu -->
  <ul class="menu">
    <li><a href="#">Shop</a></li>
    <li><a href="#">On Sale</a></li>
    <li><a href="#">New Arrivals</a></li>
    <li><a href="#">Brands</a></li>
  </ul>

  <!-- Search and Icons -->
  <div class="nav-icons">
    <div class="search-container">
      <input type="text" placeholder="Search for products..." class="search-input">
      <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M21 21l-4.35-4.35M17.25 10.5a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" />
      </svg>
    </div>

    <!-- Cart Icon -->
    <button class="icon-btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M10 21a1 1 0 11-2 0 
              1 1 0 012 0zm8 0a1 1 0 11-2 0 1 1 0 012 0z" />
      </svg>
    </button>

    <!-- User Icon -->
    <button class="icon-btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 
              0115 0" />
      </svg>
    </button>
  </div>
</nav>
</header>

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
      <p class="desc">This stylish graphic t-shirt is made from premium cotton for comfort and durability. Crafted to last and perfect for your everyday look.</p>

      <div class="size">
        <p>Size:</p>
        <span>Small</span><span>Medium</span><span>Large</span><span>X-Large</span>
      </div>

      <div class="qty">
        <button>-</button>
        <input type="text" value="1">
        <button>+</button>
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

  <div class="subscribe">
    <h3>Stay up to date about our latest offers</h3>
    <div>
      <input type="email" placeholder="Enter your email">
      <button>Subscribe</button>
    </div>
  </div>
</div>

<footer>
  <div class="footer-grid">
    <div>
      <h4>SHOP.CO</h4>
      <p>Find clothes that match your unique style and stand out from the crowd.</p>
    </div>
    <div>
      <h4>Company</h4>
      <a href="#">About</a><a href="#">Features</a><a href="#">Works</a><a href="#">Career</a>
    </div>
    <div>
      <h4>Help</h4>
      <a href="#">Customer Support</a><a href="#">Delivery Details</a><a href="#">Terms & Conditions</a><a href="#">Privacy Policy</a>
    </div>
    <div>
      <h4>Resources</h4>
      <a href="#">Free eBooks</a><a href="#">Development Tutorial</a><a href="#">How to - Blog</a><a href="#">Youtube Playlist</a>
    </div>
  </div>
  <div class="bottom">© 2025 Shop.CO. All rights reserved.</div>
</footer>

</body>
</html>
