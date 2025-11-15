<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brands;

class BarangController extends Controller
{
    /**
     * Landing page: Display products for public view.
     */
    public function landing(Request $request)
    {
        $products = Products::with(['category', 'brand'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing', compact('products'));
    }

    /**
     * Display a listing of the products (admin resource).
     */
    public function index()
    {
        $products = Products::with(['category', 'brand'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('barang.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Categories::all();
        $brands = Brands::all();
        return view('barang.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created product in storage.
     *
     * Now stores image as BLOB in DB (`products.image`) if uploaded.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id'    => 'nullable|exists:brands,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'size'        => 'nullable|string|max:50',
            'color'       => 'nullable|string|max:50',
            'sku'         => 'required|string|unique:products,sku',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'   => 'sometimes|boolean',
        ]);

        // Handle BLOB image storage in DB
        if ($request->hasFile('image')) {
            $validatedData['image'] = file_get_contents($request->file('image')->getRealPath());
        }

        Products::create($validatedData);

        return redirect()->route('barang.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource product.
     */
    public function show($id)
    {
        $product = Products::with(['category', 'brand'])->findOrFail($id);
        return view('barang.show', compact('product'));
    }

    /**
     * Add the specified product to the shopping cart.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        // Example using session for cart (for demonstration)
        $cart = session()->get('cart', []);

        // Calculate the quantity to add (default to 1, or use user-provided value if present)
        $quantity = $request->input('quantity', 1);
        if (!is_numeric($quantity) || intval($quantity) < 1) {
            $quantity = 1;
        }
        $quantity = intval($quantity);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image, // You may want to handle BLOB image carefully if needed
            ];
        }
        session()->put('cart', $cart);

        // ✅ FIXED: redirect ke halaman cart (GET), bukan ke route POST
        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        $brands = Brands::all();
        return view('barang.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified product in storage.
     *
     * Now updates image BLOB in DB if file uploaded.
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id'    => 'nullable|exists:brands,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'size'        => 'nullable|string|max:50',
            'color'       => 'nullable|string|max:50',
            'sku'         => 'required|string|unique:products,sku,' . $product->id,
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'   => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = file_get_contents($request->file('image')->getRealPath());
        } else {
            unset($validatedData['image']);
        }

        $product->update($validatedData);

        return redirect()->route('barang.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource product from storage.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('barang.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Search and sort products by name, description, SKU, category, or brand.
     * Accepts 'q' (query) and 'sort' parameters in the request.
     * Example usage: /products/search?q=shirt&sort=price_asc
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $sort = $request->input('sort');
        $productsQuery = Products::with(['category', 'brand'])
            ->where('is_active', true);

        if ($query) {
            $productsQuery->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('sku', 'LIKE', "%{$query}%");
            });

            // Optionally filter by category/brand name as well
            $productsQuery->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            });
            $productsQuery->orWhereHas('brand', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            });
        }

        // Sorting logic
        $sortField = 'created_at';
        $sortDirection = 'desc';

        switch ($sort) {
            case 'created_at_asc':
                $sortField = 'created_at';
                $sortDirection = 'asc';
                break;
            case 'created_at_desc':
                $sortField = 'created_at';
                $sortDirection = 'desc';
                break;
            case 'price_asc':
                $sortField = 'price';
                $sortDirection = 'asc';
                break;
            case 'price_desc':
                $sortField = 'price';
                $sortDirection = 'desc';
                break;
            case 'name_asc':
                $sortField = 'name';
                $sortDirection = 'asc';
                break;
            case 'name_desc':
                $sortField = 'name';
                $sortDirection = 'desc';
                break;
            default:
                break;
        }

        $products = $productsQuery->orderBy($sortField, $sortDirection)->get();

        return view('barang.search', compact('products', 'query', 'sort'));
    }

    /**
     * View the cart page.
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'total'));
    }

    /**
     * Get cart count for badge update.
     */
    public function cartCount()
    {
        $cart = session()->get('cart', []);
        $count = collect($cart)->sum('quantity');
        return response()->json(['count' => $count]);
    }
}
