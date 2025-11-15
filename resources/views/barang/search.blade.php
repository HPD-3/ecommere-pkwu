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
<body>
    @include('partials.navbar')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-2xl font-extrabold mb-6">Product Search</h1>

    <form method="GET" action="{{ url('barang/search') }}" class="max-w-lg flex gap-2 mb-8">
        <input 
            type="text" 
            name="q"
            value="{{ request('q') }}"
            placeholder="Search by name, description, SKU, category, brand..."
            class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black"
        >
        <div>
            <select name="sort" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Sort By</option>
                <option value="created_at_desc" {{ request('sort') == 'created_at_desc' ? 'selected' : '' }}>Newest</option>
                <option value="created_at_asc" {{ request('sort') == 'created_at_asc' ? 'selected' : '' }}>Oldest</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A - Z)</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z - A)</option>
            </select>
        </div>
        <button type="submit" class="bg-black text-white px-5 py-2 rounded-md hover:bg-gray-800">Search</button>
    </form>

    @if(isset($query) && $query !== null && $query !== '')
        <p class="mb-6 text-gray-600">Showing results for "<span class="font-semibold">{{ $query }}</span>"</p>
    @endif

    @if($products && $products->count())
        @php
            // Custom helper: Checks if $haystack starts with any of the $prefixes
            if (!function_exists('str_starts_with_any')) {
                function str_starts_with_any($haystack, array $prefixes) {
                    foreach ($prefixes as $prefix) {
                        if (substr($haystack, 0, strlen($prefix)) === (string)$prefix) {
                            return true;
                        }
                    }
                    return false;
                }
            }
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($products as $barang)
                @php
                    $imgSrc = '';
                    if (!empty($barang->image)) {
                        if (
                            is_string($barang->image) && (
                                (class_exists('\Illuminate\Support\Str') && method_exists('\Illuminate\Support\Str', 'startsWith') && \Illuminate\Support\Str::startsWith($barang->image, 'http://')) ||
                                (class_exists('\Illuminate\Support\Str') && method_exists('\Illuminate\Support\Str', 'startsWith') && \Illuminate\Support\Str::startsWith($barang->image, 'https://')) ||
                                (function_exists('str_starts_with_any') && str_starts_with_any($barang->image, ['http://', 'https://']))
                            )
                        ) {
                            $imgSrc = $barang->image;
                        } elseif (is_string($barang->image) && file_exists(public_path('storage/'.$barang->image))) {
                            $imgSrc = asset('storage/'.$barang->image);
                        } elseif (is_string($barang->image) && file_exists(public_path($barang->image))) {
                            $imgSrc = asset($barang->image);
                        } elseif (is_string($barang->image)) {
                            // Probably a binary BLOB from DB, show as base64
                            $imgSrc = 'data:image/jpeg;base64,' . base64_encode($barang->image);
                        }
                    } else {
                        $imgSrc = 'https://ui-avatars.com/api/?name='.urlencode($barang->name).'&background=ddd&color=444&size=256';
                    }
                @endphp
                <div class="bg-white shadow rounded-lg overflow-hidden flex flex-col hover:scale-105 transition-transform duration-150 h-full">
                    <a href="{{ route('barang.show', $barang->id) }}" class="flex flex-col h-full">
                        <div class="flex-shrink-0 h-48 w-full">
                            <img 
                                src="{{ $imgSrc }}" 
                                alt="{{ $barang->name }}" 
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h2 class="text-lg font-bold truncate">{{ $barang->name }}</h2>
                            <p class="text-sm text-gray-500 truncate mb-1">{{ $barang->brand?->name ?? '' }}</p>
                            <p class="text-sm text-gray-500 truncate mb-2">{{ $barang->category?->name ?? '' }}</p>
                            <p class="font-semibold text-gray-700 mb-2">Rp{{ number_format($barang->price,0,',','.') }}</p>
                            <a href="{{ route('barang.show', $barang->id) }}" class="inline-block text-xs px-3 py-1 rounded-full bg-black text-white hover:bg-gray-800">Detail</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 py-20">
            No products found.
        </div>
    @endif
    
</div>
</body>
</html>
