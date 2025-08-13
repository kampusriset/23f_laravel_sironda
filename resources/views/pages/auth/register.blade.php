@extends('layouts.auth')
@section('title', 'Login')
@section('content')
 <div class="floating-elements"></div>
    <div class="auth-container">
        <div class="auth-card">
            <h1>Daftar ke SiRonda</h1>
            
            @if($errors->any())
             @foreach ($errors->all() as $error)
             <div class="alert alert-danger" style="display: none;">
                 <ul>
                     <li>{{ $error }}</li>
                 </ul>
             </div>
            @endforeach
            @endif
            
            <form action="{{ route('register-store') }}" method="POST">
            @csrf
                <div class="auth-form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required>
                </div>
                <div class="auth-form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
                </div>
                <div class="auth-form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                </div>
                <div class="auth-form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan konfirmasi password Anda" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <div class="register-link">
                    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
                </div>
                <div class="register-link">
                    <p>← <a href="/">Kembali ke halaman Awal</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add form interaction effects
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('.btn-primary');
            const inputs = document.querySelectorAll('input');
            const alert = document.querySelector('.alert');

            alert.style.display = 'block';
            form.addEventListener('submit', function(e) {
                submitBtn.textContent = 'Memproses...';
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                // Simulate loading
                setTimeout(() => {
                    submitBtn.textContent = 'Login';
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                }, 2000);
            });

            // Add input validation effects
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    const formGroup = this.parentElement;
                    if (this.value.length > 0) {
                        if (this.value.length < 3) {
                            formGroup.classList.add('error');
                            formGroup.classList.remove('success');
                        } else {
                            formGroup.classList.add('success');
                            formGroup.classList.remove('error');
                        }
                    } else {
                        formGroup.classList.remove('error', 'success');
                    }
                });

                input.addEventListener('input', function() {
                    const formGroup = this.parentElement;
                    if (formGroup.classList.contains('error') && this.value.length >= 3) {
                        formGroup.classList.remove('error');
                        formGroup.classList.add('success');
                    }
                });
            });

            setTimeout(() => {
                    alert.style.display = 'none';
            }, 3000);
        });
    </script>
@endsection