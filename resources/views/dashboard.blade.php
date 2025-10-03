@extends('layouts.app')

@section('title', 'Cycle')

@section('content')
<!-- header section start -->
<div class="header_section header_bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    </nav>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="best_text">Best</div>
                                <div class="image_1"><img src="images/indomie.jpg" alt="Cycle 1"></div>
                            </div>
                            <div class="col-md-5">
                                <h1 class="banner_taital">Indomie Goreng</h1>
                                <p class="banner_text">Indomie Goreng, Cita Rasa Klasik, Kenikmatan Tiada Tara</p>
                                <div class="contact_bt"><a href="cycle">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="best_text">Best</div>
                                <div class="image_1"><img src="images/bimoli.png" alt="Cycle 2"></div>
                            </div>
                            <div class="col-md-5">
                                <h1 class="banner_taital">Bimoli</h1>
                                <p class="banner_text">Bimoli, Minyak Berkualitas, Masakan Lebih Lezat!</p>
                                <div class="contact_bt"><a href="cycle">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="best_text">Best</div>
                                <div class="image_1"><img src="images/aqua.jpg" alt="Cycle 3"></div>
                            </div>
                            <div class="col-md-5">
                                <h1 class="banner_taital">Aqua</h1>
                                <p class="banner_text">Aqua, Sumber Kesegaran di Setiap Tetes!</p>
                                <div class="contact_bt"><a href="cycle">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!-- banner section end -->
</div>
<!-- header section end -->

<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container">
        <h1 class="about_taital">Seputar Sumber Alam</h1>
        <p class="about_text">Sumber Alam dimulai dengan satu tujuan: mempermudah hidup Anda. Dari bahan pokok hingga produk kebutuhan rumah tangga, kami selalu ada untuk memastikan setiap belanjaan Anda lengkap, berkualitas, dan terjangkau.</p>
        <div class="about_main">
            <img src="images/indomie.jpg" class="image_5" alt="About Cycle">
        </div>
       
    </div>
</div>
<!-- about section end -->

<!-- footer section start -->
<!-- footer section end -->

<!-- copyright section start -->
<!-- copyright section end -->
@endsection

<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
