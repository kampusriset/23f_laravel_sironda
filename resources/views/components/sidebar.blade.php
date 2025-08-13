<div class="sidebar">
        <div class="logo">
                <div class="logo-icon">🛡️</div>
                SiRonda
        </div>
        <div class="sidebar-links">
            <a href="{{ url('dashboard') }}">Dashboard</a>
            <a href="{{ url('absen') }}">Absen</a>
            <a href="{{ url('jadwal') }}">Jadwal</a>
            <a href="{{ url('laporan') }}">Laporan</a>
            <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
</div>