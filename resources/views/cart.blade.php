<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-[#f2f0f1]">
@include('partials.navbar')

<section class="max-w-5xl mx-auto py-16 px-6 mt-24 bg-white rounded-3xl shadow-lg animate__animated animate__fadeInUp">
  <h1 class="text-3xl font-bold mb-8 text-center">🛒 Keranjang Belanja</h1>

  @if(session('success'))
      <div class="text-green-600 text-center mb-4 font-semibold">{{ session('success') }}</div>
  @endif

  @if(empty($cart))
      <p class="text-center text-gray-600">Keranjang masih kosong.</p>
  @else
      <div class="overflow-x-auto">
          <table class="min-w-full text-sm">
              <thead>
                  <tr class="border-b bg-gray-50 text-gray-700">
                      <th class="py-3 px-4 text-left">Produk</th>
                      <th class="py-3 px-4 text-left">Harga</th>
                      <th class="py-3 px-4 text-center">Jumlah</th>
                      <th class="py-3 px-4 text-right">Subtotal</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($cart as $item)
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-3 px-4 flex items-center gap-3">
                              <img src="{{ $item['image'] ? 'data:image/jpeg;base64,'.base64_encode($item['image']) : 'https://via.placeholder.com/60x60' }}" class="w-12 h-12 rounded object-cover">
                              <span>{{ $item['name'] }}</span>
                          </td>
                          <td class="py-3 px-4">Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                          <td class="py-3 px-4 text-center">{{ $item['quantity'] }}</td>
                          <td class="py-3 px-4 text-right font-semibold">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>

      <div class="flex justify-between items-center mt-6">
          <h2 class="text-lg font-bold">Total: Rp{{ number_format($total, 0, ',', '.') }}</h2>
          <button class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition">Checkout</button>
      </div>
  @endif
</section>

@include('partials.footers')
</body>
</html>
