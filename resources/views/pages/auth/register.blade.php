@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<div class="auth-container">
<div class="auth-card">
    <h1>Daftar ke Sironda</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('register-store') }}" method="POST">
        @csrf
        <div class="auth-form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>
        </div>
        <div class="auth-form-group">
            <label for="username">Username</label>
            <input type="username" name="username" required>
        </div>
        <div class="auth-form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="auth-form-group">
            <label for="password_confirmation">Masukkan Password Lagi</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <div class="auth-form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="">
                <option value="M" {{ $petugas->gender == 'M' ? 'selected' : '' }}>Laki-laki</option>
                <option value="F" {{ $petugas->gender == 'F' ? 'selected' : '' }}>Perempuan</option>
            </select>
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
