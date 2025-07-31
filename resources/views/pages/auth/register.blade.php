@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<div class="auth-container">
<div class="auth-card">
    <h1>Daftar ke Sironda</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="auth-form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" required>
        </div>
        <div class="auth-form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="auth-form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="auth-form-group">
            <label for="confirm_password">Masukkan Password Lagi</label>
            <input type="password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
        <div class="register-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
        <div class="register-link">
            <p><-<a href="/">Kembali ke halaman Awal </a></p>
        </div>
    </form>
</div>
</div>
@endsection
