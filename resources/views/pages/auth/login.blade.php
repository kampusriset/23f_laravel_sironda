@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <h1>Login ke SiRonda</h1>
            <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="auth-form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="auth-form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="register-link">
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
            </div>
            <div class="register-link">
            <p><-<a href="/">Kembali ke halaman Awal </a></p>
        </div>
        </form>
    </div>
    </div>
@endsection
