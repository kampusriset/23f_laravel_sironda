<nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">🛡️</div>
                SiRonda
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#cara-kerja">Cara Kerja</a></li>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
            <div class="user-section">
                @if(Auth::check())
                <span>{{ Auth::user()->nama_lengkap }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
            @else
                <a href="{{ url('login') }}" class="login-btn">Login</a>
                @endif
            </div>
        </div>
    </nav>