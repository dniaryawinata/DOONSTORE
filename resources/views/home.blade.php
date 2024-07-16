<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Pages</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/b3cd1d5193.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <h1 class="logo"> DOONSTORE</h1>
        <nav>
            <a href="#landing">Home</a>
            <a href="#about"> About</a>
            <a href="#contact">Contact Us</a>
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

    <section id="landing">
        <div>
            <h1 class="font-landing" style="text-align:left">DOONSTORE</h1>
            <p class="font-landing2" style="margin-right: 20px;"> Selamat datang di situs web kami, tempat Anda dapat menemukan solusi lengkap untuk semua kebutuhan fashion sepatu Anda. Kami adalah destinasi online terkemuka untuk semua hal terkait sepatu, yang didedikasikan untuk memberikan pengalaman berbelanja yang tak tertandingi kepada pelanggan kami.</p>
            <div>
                <button class="btn-index"><a href="#about" style="color:white">Catalog</a></button>
                <button class="btn-index"><a href="#contact" style="color:white">Contact Us</a></button>
                <button class="btn-index"><a href="{{route('contacts.index')}}" style="color:white">List Contact</a></button>
            </div>
        </div>
        <div clas="sepatu">
            <img src="{{asset('image/gallerysepatu.webp')}}" alt="landing image" style="width: 40vw;">
        </div>
    </section>
    <section id="about">
        <div>
            <h1 class="font1"> About Us </h1>
            <p class="font2"> Selamat datang di DOONSTORE, destinasi utama Anda untuk menjadikan langkah Anda lebih bergaya dengan koleksi sepatu terbaik dan desain yang menginspirasi. Di DOONSTORE, kami mengerti bahwa sepatu bukan hanya aksesori, melainkan bagian penting dari penampilan dan kenyamanan Anda. Itu sebabnya kami dengan bangga menyediakan beragam sepatu berkualitas tinggi untuk mengubah setiap langkah Anda menjadi pengalaman yang penuh percaya diri dan gaya.
                Di DOONSTORE, kami bukan hanya sekadar toko sepatu online. Kami adalah rekan Anda dalam menemukan sepatu yang Anda impikan. Kami berharap Anda menemukan inspirasi di sini dan menemukan sepatu yang tidak hanya mempercantik penampilan Anda tetapi juga mencerminkan kepribadian Anda. Temukan koleksi sepatu terbaik kami yang dirancang untuk setiap kesempatan, mulai dari sepatu kasual sehari-hari hingga sepatu formal untuk acara istimewa. Selamat berbelanja di DOONSTORE, tempat di mana kenyamanan dan gaya berjalan seiring.</p>
            <div class="owl-carousel">
                <img class="gambar1" src="{{asset('image/imagesepatu1.jpg')}}" alt="Product Image">
                <img class="gambar2" src="{{asset('image/imagesepatu2.jpg')}}" alt="Product Image">
                <img class="gambar3" src="{{asset('image/imagesepatu3.jpg')}}" alt="Product Image">
            </div>
        </div>
    </section>

    <section id="contact">
        <h1 class="contact-title" style="text-align:left">Contact US</h1>
        <p>Silahkan Hubungi Kami dengan mengisi form dibawah ini.</p>
        <div class="contact-detail">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <h1>Tell us your problem</h1>
                <div class="form-group">
                    <div id="input-name" class="input-group">
                        <p><label for="name">Name</label></p>
                        <input type="text" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="input-subject" class="input-group">
                        <p><label for="subject">Subject</label></p>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
                        @error('subject')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="input-email" class="input-group">
                        <p><label for="email">Email</label></p>
                        <input type="email" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="input-phone" class="input-group">
                        <p><label for="phone">Phone Number</label></p>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="input-message" class="input-group">
                        <p><label for="message">Message</label></p>
                        <input type="text" id="message" name="message" value="{{ old('message') }}">
                        @error('message')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn-submit" type="submit">Submit</button>
            </form>
        </div>
    </section>


    <footer>
        <p>&copy; 2024 DOONSTORE. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                center: true,
                items: 3,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>