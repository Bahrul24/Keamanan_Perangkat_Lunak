<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Alam</title>

    <!-- Meta Tags -->
    <meta name="keywords" content="Indomie, makanan favorit, mie instan">
    <meta name="description" content="Nikmati berbagai rasa Indomie favorit Anda hanya di Indomie Lovers.">
    <meta name="author" content="Indomie Lovers Team">
    <!-- Favicon -->
    <link rel="icon" href="images/fevicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Custom Inline Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .banner-section {
            background: linear-gradient(to bottom, #6a8d9c, #a4c9d7); /* Gradasi dari lebih gelap ke lebih terang */
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .banner-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .banner-text {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #ddd;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            transform: scale(1.1);
        }

        .btn-login {
            color: #fff;
        }

        .btn-register {
            color: #fff;
        }

        .btn-dashboard {
            background-color: #007bff;
            color: #fff;
        }

        .banner-image {
            background: linear-gradient(45deg, #f7c17b, #ffcc66); /* Gradasi linear dengan sudut 45 derajat */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transform: skew(-20deg); /* Efek miring untuk bentuk jajar genjang */
            overflow: hidden; /* Menghindari konten keluar dari batas */
        }

        .banner-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            transform: skew(20deg); /* Menyeimbangkan efek skew pada gambar */
        }



        @media (max-width: 768px) {
            .banner-title {
                font-size: 2rem;
            }

            .banner-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Banner Section -->
    <div class="banner-section">
        <div id="main-slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 class="banner-title">Sumber Alam    </h1>
                                <p class="banner-text">Belanja Hemat, Hidup Lebih Nyaman</p>
                                @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-custom btn-dashboard">Dashboard</a>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-custom btn-login">Login</a>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-custom btn-register">Register</a>
                                @endif
                                @endauth
                            </div>
                            <div class="col-md-6 banner-image">
                                <img src="images/logo.png" alt="Indomie Lovers">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan slide lain jika diperlukan -->
            </div>
            <!-- Navigation Controls -->
            <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left fa-2x"></i>
            </a>
            <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
                <i class="fa fa-angle-right fa-2x"></i>
            </a>
        </div>
    </div>
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>