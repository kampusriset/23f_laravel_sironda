<div class="sidebar">
        <a href="{{ url('dashboard') }}" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" width="60" alt="Logo SiRonda" class="logo">
            <span class="app-name">{{ config('app.name', 'SiRonda') }}</span>
        </a>
        <div class="sidebar-links">
            <a href="{{ url('dashboard') }}">Dashboard</a>
            <a href="{{ url('absen') }}">Absen</a>
            <a href="{{ url('jadwal') }}">Jadwal</a>
            <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
</div>