<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Add New Product</h1>
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

        <form action="{{ route('barang.store') }}" method="POST" class="bg-white rounded-lg shadow p-8 space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block font-semibold mb-1" for="name">Product Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="description">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="category_id">Category <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
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
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="price">Price <span class="text-red-500">*</span></label>
                <input type="number" id="price" name="price" min="0" step="0.01" value="{{ old('price') }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="stock">Stock <span class="text-red-500">*</span></label>
                <input type="number" id="stock" name="stock" min="0" value="{{ old('stock') }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="size">Size</label>
                <select id="size" name="size" class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Size --</option>
                    <option value="Small" {{ old('size') == 'Small' ? 'selected' : '' }}>Small</option>
                    <option value="Medium" {{ old('size') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Large" {{ old('size') == 'Large' ? 'selected' : '' }}>Large</option>
                    <option value="X-Large" {{ old('size') == 'X-Large' ? 'selected' : '' }}>X-Large</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="color">Color</label>
                <input type="text" id="color" name="color" maxlength="50" value="{{ old('color') }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block font-semibold mb-1" for="sku">SKU <span class="text-red-500">*</span></label>
                <input type="text" id="sku" name="sku" maxlength="255" value="{{ old('sku') }}"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1" for="image">Product Image</label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg"
                       class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-gray-500 mt-1">Accepted formats: jpeg, png, jpg, gif, svg. Max size: 2MB.</p>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                       {{ old('is_active', true) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
                <label for="is_active" class="ml-2 font-medium">Active</label>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-3 px-6 rounded bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
{{-- 
    NOTE: 
    If you see a "Malformed UTF-8 characters, possibly incorrectly encoded" error in the Blade view or the Laravel component
    (for example: exceptions/renderer/components/topbar.blade.php), the most common root cause is an invalid or non-UTF-8 encoded
    character somewhere in a Blade template, PHP file, or in the database content shown in this view.

    TO FIX: 
    1. Ensure this file is saved as UTF-8 (without BOM).
    2. If you pasted content from an external source (Word, PDF, web), retype suspect lines by hand.
    3. Check any data sent to this view for invalid encoding or strange characters.
    4. Use a programmer's editor that can show ALL invisible/special characters.
    5. If seen during error reporting ("renderer/components/topbar.blade.php"), check any recently edited views or models.

    TOOLS:
      - On Linux/macOS: find non-ASCII via
          grep -P -n "[^\x00-\x7F]" resources/views/
      - Or use a hex editor to examine content.

    If the error persists in exception pages, check and clean all error message content and the offending Blade component(s).
--}
