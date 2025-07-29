 <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" height="50" alt="Logo SiRonda" class="logo">
                <span class="app-name">{{ config('app.name', 'SiRonda') }}</span>
            </a>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
</nav>
