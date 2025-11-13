<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f6f6f6; margin: 0; padding: 0; }
        .container { max-width: 420px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 12px #0001; padding: 2em 2em; }
        h2 { text-align: center; }
        .form-group { margin-bottom: 1.5em; }
        label { display: block; margin-bottom: .5em; font-weight: 600; }
        input[type="number"] { width: 100%; padding: .5em; border: 1px solid #ccc; border-radius: 5px; }
        .btn { width: 100%; padding: .8em; font-size: 1.1em; background: #111; color: #fff; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background .2s; }
        .btn:hover { background: #444; }
        .success { background: #d1fae5; color: #047857; padding: .75em; border-radius: 5px; margin-bottom: 1.25em; }
        .error { background: #fee2e2; color: #b91c1c; padding: .75em; border-radius: 5px; margin-bottom: 1.25em; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Product to Cart</h2>
        <!-- Success or error messages -->
        <!-- (Placeholders for blade logic: replace with real message if integrating with Laravel) -->
        <!-- <div class="success">Product added to cart.</div>
        <div class="error">Something went wrong.</div> -->
        <form action="/cart/add/1" method="POST">
            <!-- @csrf for Laravel - include if in blade -->
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" min="1" value="1" id="quantity" name="quantity" required>
            </div>
            <button class="btn" type="submit">Add to Cart</button>
        </form>
    </div>
</body>
</html>

