<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Shoes Shopping Cart</title>
  <link rel="stylesheet" href="{{ asset('assets/css/doni.css') }}">
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

  <h1>Shoes Shopping Cart</h1>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="cartItems"></tbody>
      <tfoot>
        <tr>
          <td colspan="4" style="text-align: right;">Total Quantity</td>
          <td id="totalQuantity" style="text-align: left;">= 0</td>
        </tr>
        <tr>
          <td colspan="4" style="text-align: right;">Subtotal</td>
          <td id="totalPrice" style="text-align: left;">= Rp 0</td>
        </tr>
      </tfoot>
    </table>
    <div class="cekout">
      <button>
        <a class="text1" href="./produk">Continue Shopping</a>
      </button>
      <button>
        <a class="text2" href="./payment">Checkout</a>
      </button>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 DOONSTORE. All rights reserved.</p>
  </footer>

  <script>
    // untuk mengudate keranjang.
    function updateCart() {
      const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
      const cartTableBody = document.getElementById('cartItems');
      cartTableBody.innerHTML = '';

      let totalQuantity = 0;
      let totalPrice = 0;

      cartItems.forEach(item => {
        const subtotal = item.price * item.quantity;
        totalQuantity += item.quantity;
        totalPrice += subtotal;

        const row = document.createElement('tr');
        row.innerHTML = `
          <td>
            <img class="gambar" src="${item.image}" alt="Product Image">
            <p>${item.name}</p>
          </td>
          <td>
            <input type="number" class="form-control quantity" value="${item.quantity}" data-price="${item.price}" data-id="${item.id}">
          </td>
          <td>Rp ${item.price.toLocaleString()}</td>
          <td class="subtotal">Rp ${subtotal.toLocaleString()}</td>
          <td><button class="remove-btn" data-id="${item.id}">Remove</button></td>
        `;
        cartTableBody.appendChild(row);
      });

      document.getElementById('totalQuantity').textContent = `= ${totalQuantity}`;
      document.getElementById('totalPrice').textContent = `= Rp ${totalPrice.toLocaleString()}`;

      document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('change', function() {
          const productId = this.dataset.id;
          const newQuantity = parseInt(this.value);
          updateProductQuantity(productId, newQuantity);
        });
      });

      document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function() {
          const productId = this.dataset.id;
          removeProduct(productId);
        });
      });
    }

    function updateProductQuantity(productId, newQuantity) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      let product = cart.find(item => item.id === productId);

      if (product) {
        product.quantity = newQuantity;
      }

      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart();
    }

    function removeProduct(productId) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart = cart.filter(item => item.id !== productId);

      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart();
    }

    updateCart();
  </script>

</body>

</html>
