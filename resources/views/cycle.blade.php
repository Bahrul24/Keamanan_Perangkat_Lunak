@extends('layouts.app')

@section('title', 'Cycle')

@section('content')
<!-- Konten untuk halaman cycle -->
<div class="header_section header_bg">
    <div class="banner_section layout_padding">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products as $index => $product)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="best_text">Best</div>
                                    <div class="image_1">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <h1 class="banner_taital">{{ $product->name }}</h1>
                                    <p class="banner_text">{{ $product->description }}</p>
                                    <div class="contact_bt">
                                        <a href="{{ route('cart.add', $product->id) }}">->Keranjang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- cycle section start -->
<div class="cycle_section layout_padding">
    <div class="container">
        <h1 class="cycle_taital">Sumber Alam</h1>
        <p class="cycle_text">Belanja Hemat, Hidup Lebih Nyaman</p>
        <div class="cycle_section_2 layout_padding">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6">
                        <div class="box_main">
                            <h6 class="number_text">{{ $loop->iteration }}</h6>
                            <div class="image_2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="cycles_text">{{ $product->name }}</h1>
                        <p class="lorem_text">{{ $product->description }}</p>
                        <div class="btn_main">
                            <div class="contact_bt">
                                <a href="{{ route('cart.add', $product->id) }}">->Keranjang</a>
                            </div>
                            <h4 class="price_text">
                                Harga <span style="color: #f7c17b">Rp</span> 
                                <span style="color: #325662">{{ number_format($product->price, 2) }}</span>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Pagination -->
        <!-- Pagination -->
<div class="read_btn_main">
    <div class="read_bt">
        {{ $products->links('vendor.pagination.default') }}
    </div>
</div>

    </div>
</div>
<!-- cycle section end -->
@endsection
