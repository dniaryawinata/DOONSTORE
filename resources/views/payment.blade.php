<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shoes Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/b3cd1d5193.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h1 class="logo">DOONSTORE</h1>
        <nav>
            <a href="./home">Home</a>
            <a href="./#about">About</a>
            <a href="./#contact">Contact Us</a>
            <a href="./produk">Product</a>
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
    <div class="main" style="min-height:77vh">

        <h1>Choose Payment</h1>
        <div class="payment-section">
            <div class="payment-header">
                <span>QRIS</span>
                <span class="toggle-arrow"></span>
            </div>
            <div class="payment-options">
                <img src="{{asset('image/gambargopay.jpg')}}"alt="GoPay">
                <img src="{{asset('image/gambardana.jpg')}}"alt="DANA">
                <img src="{{asset('image/gambarqris.webp')}}"alt="QRIS">
                <img src="{{asset('image/gambarovo.webp')}}"alt="OVO">
                <img src="{{asset('image/gambarshopepay.jpg')}}"alt="ShopeePay">
            </div>
        </div>
    
        <div class="payment-section">
            <div class="payment-header">
                <span>Virtual Account</span>
                <span class="toggle-arrow"></span>
            </div>
            <div class="payment-options">
                <img src="{{asset('image/bankbca.png')}}"alt="Bca">
                <img src="{{asset('image/permatabank.jpg')}}"alt="PermataBank">
                <img src="{{asset('image/bankbri.svg')}}"alt="BRI">
                <img src="{{asset('image/bankmandiri.jpg')}}"alt="Mandiri">
            </div>
        </div>
    
        <div class="payment-section">
            <div class="payment-header">
                <span>Convenience Store</span>
                <span class="toggle-arrow"></span>
            </div>
            <div class="payment-options">
                <img src="{{asset('image/gambaralfamart.png')}}"alt="Alfamart">
                <img src="{{asset('image/gambarindomaret.png')}}"alt="Indomaret">
                <img src="{{asset('image/gambaralfamidi.jpg')}}"alt="Alfamidi">
            </div>
        </div>
    </div>

    <footer>
    <p>&copy; 2024 DOONSTORE. All rights reserved.</p>
  </footer>

</body>
</html>