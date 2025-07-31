@vite('resources/css/app.css')
<title>{{config('app.name')}} | Login</title>
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
    </form>
</div>
