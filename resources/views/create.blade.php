@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Tambahkan Produk Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter product name">
                        </div>

                        <!-- Product Description -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required placeholder="Enter product description"></textarea>
                        </div>

                        <!-- Product Price -->
                        <div class="form-group mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" name="price" id="price" class="form-control" required placeholder="Enter product price" step="0.01">
                        </div>

                        <!-- Product Image -->
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg">Buat Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
