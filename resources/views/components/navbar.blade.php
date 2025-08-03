 <nav class="navbar">
     <a href="{{ url('/') }}" class="navbar-brand">
         <img src="{{ asset('images/logo.png') }}" width="60" alt="Logo SiRonda" class="logo">
         <span class="app-name">{{ config('app.name', 'SiRonda') }}</span>
     </a>
     <div class="navbar-toggle">
         <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
         <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
         <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
     </div>
     <div class="navbar-links">
         <a href="{{ url('/') }}">Home</a>
         <a href="{{ url('dashboard') }}">Dashboard</a>
         @if(Auth::check())
         <a href="{{ url('/jadwal') }}">Jadwal</a>
         <a href="{{ url('/absen') }}">Absen</a>
         @endif
         <a href="{{ url('/contact') }}">Contact</a>
         <span></span>
         <div class="user-menu">
             @if (Auth::check())
                 <a href="{{ url('/profile') }}">{{ Auth::user()->nama_lengkap }}</a>
                 <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit" class="logout-button">Logout</button>
                 </form>
             @else
                 <a style="color: white" href="{{ route('login') }}" class="login-button">Login</a>
                 <a style="color: white" href="{{ route('register') }}" class="login-button">Register</a>
             @endif
         </div>
     </div>
 </nav>
 <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.navbar-toggle');
            const navbarLinks = document.querySelector('.navbar-links');
            
            toggleButton.addEventListener('click', function() {
                if (!navbarLinks.classList.contains('active')) {
                    navbarLinks.classList.add('active');
                } else {
                    navbarLinks.classList.remove('active');
                }
            });

            document.addEventListener('click', (event) => {
                if(!event.target.closest('.navbar')) {
                    navbarLinks.classList.remove('active');
                }
            })
        });
 </script>
