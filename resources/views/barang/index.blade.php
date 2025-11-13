<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN (replace with your build if present) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Product List</h1>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('barang.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                Add New Product
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 whitespace-nowrap">
                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">#</th>
                        <th class="py-3 px-4 text-left font-semibold">Image</th>
                        <th class="py-3 px-4 text-left font-semibold">Name</th>
                        <th class="py-3 px-4 text-left font-semibold">SKU</th>
                        <th class="py-3 px-4 text-left font-semibold">Category</th>
                        <th class="py-3 px-4 text-left font-semibold">Brand</th>
                        <th class="py-3 px-4 text-left font-semibold">Price</th>
                        <th class="py-3 px-4 text-left font-semibold">Stock</th>
                        <th class="py-3 px-4 text-left font-semibold">Active</th>
                        <th class="py-3 px-4 text-left font-semibold">Created At</th>
                        <th class="py-3 px-4 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                @php use Illuminate\Support\Str; @endphp
                @forelse ($products as $i => $product)
                    <tr>
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4">
                            @if($product->image)
                                @php
                                    $imageSrc = '';
                                    // New: handle image BLOB (display via data URI if not a string (i.e., resource or non-string))
                                    if (is_string($product->image) && Str::startsWith($product->image, ['http://', 'https://'])) {
                                        // Remote URL
                                        $imageSrc = $product->image;
                                    } elseif (is_string($product->image) && file_exists(public_path('storage/' . $product->image))) {
                                        $imageSrc = asset('storage/' . $product->image);
                                    } elseif (is_string($product->image) && file_exists(public_path($product->image))) {
                                        $imageSrc = asset($product->image);
                                    } else {
                                        // Assume image is BLOB binary data (as per Products::image field migration)
                                        // Detect the mime type - fallback to image/jpeg
                                        $mime = 'image/jpeg'; // You may enhance this further with intervention/image or finfo for more accuracy
                                        if (is_string($product->image)) {
                                            // If the binary image is a raw string (not a file name)
                                            $base64 = base64_encode($product->image);
                                            $imageSrc = 'data:' . $mime . ';base64,' . $base64;
                                        } else {
                                            // fallback to placeholder if unreadable
                                            $imageSrc = 'https://via.placeholder.com/56x56?text=No+Image';
                                        }
                                    }
                                @endphp
                                <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded shadow" onerror="this.onerror=null;this.src='https://via.placeholder.com/56x56?text=No+Image';">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="py-3 px-4">{{ $product->sku }}</td>
                        <td class="py-3 px-4">{{ $product->category?->name ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $product->brand?->name ?? '-' }}</td>
                        <td class="py-3 px-4">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="py-3 px-4">{{ $product->stock }}</td>
                        <td class="py-3 px-4">
                            @if($product->is_active)
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">Active</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded">Inactive</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $product->created_at->format('Y-m-d') }}</td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="{{ route('barang.edit', $product->id) }}" class="px-3 py-1 text-xs font-semibold rounded bg-yellow-500 text-white hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('barang.destroy', $product->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-xs font-semibold rounded bg-red-600 text-white hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="py-8 px-4 text-center text-gray-400 italic">No products found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
