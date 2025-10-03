@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="header_section header_bg"></div>

<div class="contact_section layout_padding" style="background-color: #f9f9f9; padding: 50px 0;">
    <div class="container">
        <div class="contact_main" style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 30px;">
            <h1 class="request_text" style="text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Kritik & Saran</h1>

            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success" style="text-align: center; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="form-group" style="margin-bottom: 15px;">
                    <div style="position: relative;">
                        <input type="text" class="email-bt" placeholder="Name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 12px 40px; border: 1px solid #ccc; border-radius: 5px;">
                        <span style="position: absolute; top: 50%; left: 12px; transform: translateY(-50%); color: #999; font-size: 16px;">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <div style="position: relative;">
                        <input type="email" class="email-bt" placeholder="Email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 12px 40px; border: 1px solid #ccc; border-radius: 5px;">
                        <span style="position: absolute; top: 50%; left: 12px; transform: translateY(-50%); color: #999; font-size: 16px;">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <div style="position: relative;">
                        <input type="text" class="email-bt" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required style="width: 100%; padding: 12px 40px; border: 1px solid #ccc; border-radius: 5px;">
                        <span style="position: absolute; top: 50%; left: 12px; transform: translateY(-50%); color: #999; font-size: 16px;">
                            <i class="fas fa-phone"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <textarea class="massage-bt" placeholder="Message" rows="5" name="message" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; resize: none;">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="send_btn" style="width: 100%; background-color: #007BFF; color: #fff; border: none; padding: 12px; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s;">
                    KIRIM
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
