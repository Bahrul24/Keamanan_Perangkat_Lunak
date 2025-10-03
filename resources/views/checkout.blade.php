@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container px-3 my-5 clearfix">
    <div class="card">
        <div class="card-header">
            <h2>Checkout</h2>
        </div>
        <div class="card-body">

            {{-- Menampilkan daftar produk di keranjang --}}
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th class="text-center py-3 px-4">Nama Produk &amp; Detail</th>
                            <th class="text-right py-3 px-4">Harga</th>
                            <th class="text-center py-3 px-4">Jumlah</th>
                            <th class="text-right py-3 px-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="p-4">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="d-block ui-w-40 ui-bordered mr-4">
                                        <div class="media-body">
                                            <a href="#" class="d-block text-dark">{{ $item->product->name }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right align-middle p-4">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </td>
                                <td class="align-middle p-4">{{ $item->quantity }}</td>
                                <td class="text-right align-middle p-4">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Total Pembayaran --}}
            <div class="d-flex justify-content-between mt-4">
                <h4>Total Pembayaran:</h4>
                <h4>Rp {{ number_format($total, 0, ',', '.') }}</h4>
            </div>

            {{-- Formulir untuk Checkout --}}
            <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="address">Alamat Pengiriman</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Proses Pembayaran</button>
            </form>
        </div>
    </div>
</div>

@endsection
