<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/komponen.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/b3cd1d5193.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

    <title>Katalog Shoes</title>
</head>

<body>
<header>
        <h1 class="logo"> DOONSTORE</h1>
        <nav>
            <a href="./home">Home</a>
            <a href="./#about"> About</a>
            <a href="./#contact">Contact Us</a>
            <a href="./produk"> Product </a>
        </nav>
        <div class="icon">
            <a href="./login">
                <i class="fa-solid fa-user fa-lg" style="padding-right: 20px; margin-top: 6.5px; color:black"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; margin-top: 6.5px;">
                    <i class="fa-solid fa-sign-out-alt fa-lg" style="padding-right: 20px; margin-top: 6.5px;"></i>
                </button>
            </form>
            <a href="./cart">
                <i class="fa-solid fa-cart-shopping fa-lg" style="color:black;"></i>
            </a>
        </div>
    </header>
    <div class="main">
        <h1>Katalog Shoes</h1>
        <div style="display: flex; flex-wrap: wrap;">
            <section class="centang" id="product1">
                <img class="gambar1" src="{{asset('image/converseblack.jpg')}}" alt="Shoes 1">
                <h2>Converse</h2>
                <p style="padding:10px">Price: Rp 899.000</p>
                <button class="add" onclick="addToCart('product1')">Add to cart</button>
            </section>
            <section class="centang" id="product2">
                <img class="gambar2" src="{{asset('image/nikejordan.jpg')}}" alt="Shoes 2">
                <h2>Nike</h2>
                <p style="padding:10px">Price: Rp 2.000.000</p>
                <button class="add" onclick="addToCart('product2')">Add to cart</button>
            </section>
            <section class="centang" id="product3">
                <img class="gambar3" src="{{asset('image/sepatupuma.jpeg')}}" alt="Shoes 3">
                <h2>Puma</h2>
                <p style="padding:10px">Price: Rp 3.000.000</p>
                <button class="add" onclick="addToCart('product3')">Add to cart</button>
            </section>
            <section class="centang" id="product4">
                <img class="gambar4" src="{{asset('image/adidasamba.jpg')}}" alt="Shoes 4">
                <h2>Adidas</h2>
                <p style="padding:10px">Price: Rp 1.000.000</p>
                <button class="add" onclick="addToCart('product4')">Add to cart</button>
            </section>
            <section class="centang" id="product5">
                <img class="gambar5" src="{{asset('image/nbsepatu.jpg')}}" alt="Shoes 5">
                <h2>NewBalance</h2>
                <p style="padding:10px">Price: Rp 1.500.000</p>
                <button class="add" onclick="addToCart('product5')">Add to cart</button>
            </section>
            <section class="centang" id="product6">
                <img class="gambar6" src="{{asset('image/drmartensepatu.jpg')}}" alt="Shoes 6">
                <h2>Dr Martens</h2>
                <p style="padding:10px">Price: Rp 5.000.000</p>
                <button class="add" onclick="addToCart('product6')">Add to cart</button>
            </section>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 DOONSTORE. All rights reserved.</p>
    </footer>

    <script>
    function addToCart(productId) {
        const productElement = document.getElementById(productId);
        const productName = productElement.querySelector('h2').innerText;
        const productPrice = productElement.querySelector('p').innerText.split('Rp ')[1].replace('.', '').replace('.', '');
        const productImage = productElement.querySelector('img').src;

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let product = cart.find(item => item.id === productId);

        if (product) {
            product.quantity += 1;
        } else {
            cart.push({ id: productId, name: productName, price: parseInt(productPrice), image: productImage, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Produck ditambahkan ke cart');
    }
    </script>

</body>
</html>
