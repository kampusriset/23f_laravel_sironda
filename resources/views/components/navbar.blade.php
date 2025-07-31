 <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" height="50" alt="Logo SiRonda" class="logo">
                <span class="app-name">{{ config('app.name', 'SiRonda') }}</span>
            </a>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/absen') }}">Absen</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <span>|</span>
            <div class="user-menu">
                @if (Auth::check())
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <a href="{{ url('/profile') }}">Akun</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                @else
                    <a style="color: white" href="{{ route('login') }}" class="login-button">Login</a>
                @endif
            </div>
        </ul>
</nav>
