<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Edit Product</h1>
        <a href="{{ route('barang.index') }}" class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-900 rounded hover:bg-gray-300 transition text-sm">
            &larr; Back to Products
        </a>

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded bg-red-100 text-red-800 border border-red-200">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang.update', $product->id) }}" method="POST" class="bg-white rounded-lg shadow p-8 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1" for="name">Product Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="description">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="category_id">Category <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="brand_id">Brand</label>
                <select id="brand_id" name="brand_id" class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label class="block font-semibold mb-1" for="price">Price (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" min="0" id="price" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="w-1/2">
                    <label class="block font-semibold mb-1" for="stock">Stock <span class="text-red-500">*</span></label>
                    <input type="number" min="0" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                        class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label class="block font-semibold mb-1" for="size">Size</label>
                    <input type="text" id="size" name="size" value="{{ old('size', $product->size) }}"
                        class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="w-1/2">
                    <label class="block font-semibold mb-1" for="color">Color</label>
                    <input type="text" id="color" name="color" value="{{ old('color', $product->color) }}"
                        class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="sku">SKU <span class="text-red-500">*</span></label>
                <input type="text" id="sku" name="sku" maxlength="255" value="{{ old('sku', $product->sku) }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="image">Product Image</label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-gray-500 mt-1">Accepted formats: jpeg, png, jpg, gif, svg. Max size: 2MB.</p>
                @if($product->image)
                    @php
                        $imageSrc = '';
                        if (is_string($product->image) && Str::startsWith($product->image, ['http://', 'https://'])) {
                            $imageSrc = $product->image;
                        } elseif (is_string($product->image) && file_exists(public_path('storage/' . $product->image))) {
                            $imageSrc = asset('storage/' . $product->image);
                        } elseif (is_string($product->image) && file_exists(public_path($product->image))) {
                            $imageSrc = asset($product->image);
                        } else {
                            $mime = 'image/jpeg';
                            if (is_string($product->image)) {
                                $base64 = base64_encode($product->image);
                                $imageSrc = 'data:' . $mime . ';base64,' . $base64;
                            } else {
                                $imageSrc = 'https://via.placeholder.com/56x56?text=No+Image';
                            }
                        }
                    @endphp
                    <div class="mt-2">
                        <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded shadow border" onerror="this.onerror=null;this.src='https://via.placeholder.com/56x56?text=No+Image';">
                        <span class="block text-xs text-gray-400 mt-1">Current Image</span>
                    </div>
                @endif
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
                <label for="is_active" class="ml-2 font-medium">Active</label>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-3 px-6 rounded bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
