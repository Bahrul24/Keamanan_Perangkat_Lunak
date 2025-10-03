<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Style CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Custom Styles -->
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@400;700&display=swap"
        rel="stylesheet">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

        <!-- Livewire Styles (for Livewire components) -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            <livewire:layout.navigation />  <!-- Livewire navigation component -->

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield(section: 'content') <!-- Content slot for child views -->
            </main>
        </div>

        <!-- Footer Section -->
        <footer class="footer_section bg-dark text-white py-5 mt-8">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-4 mb-4">
                    <h4 class="text-uppercase">Seputar Sumber Alam</h4>
                    <p>Sumber Alam dimulai dengan satu tujuan: mempermudah hidup Anda. Dari bahan pokok hingga produk kebutuhan rumah tangga, kami selalu ada untuk memastikan setiap belanjaan Anda lengkap, berkualitas, dan terjangkau.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-4">
                </div>

                <!-- Contact Us -->
                <div class="col-md-4 mb-4">
                    <h4 class="text-uppercase">Hubungi Kami</h4>
                    <p><i class="fa fa-map-marker"></i>Desa komplang dusun Winong RT 6 RW 4. Kecamatan Paron kab Ngawi</p>
                    <p><i class="fa fa-phone"></i>+62 984 8931 8741</p>
                    <p><i class="fa fa-envelope"></i>sumberalam17@gmail.com</p>
                   
                </div>
            </div>
        </div>
        </footer>

        <!-- Copyright Section -->
        <div class="copyright_section">
            <p>Copyright © 2024 All Rights Reserved By SumberAlam.</p>
        </div>

        <!-- Livewire Scripts -->
        @livewireScripts

        <!-- Custom JavaScript -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <!-- Optional: Custom Scripts for live interactions -->
        <script>
            // Add your custom JavaScript here if needed
        </script>
    </body>
</html>
