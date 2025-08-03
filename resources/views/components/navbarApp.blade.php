    <div class="navbar">
        <div style="display: flex; align-items:center; gap: 10px">
            <div class="navbar-toggle">
                <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
                <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
                <div style="border-radius: 2px; height: 4px; width: 30px; background-color: black;"></div>
            </div>
            <p>Selamat Malam, <b>{{Auth::user()->nama_lengkap}}</b></p>
        </div>

        <div>
            <a href="{{ url('profile') }}">
                <div class="circle-profile">
                    
                </div>
            </a>
        </div>
    </div>
 <script>
    //  document.addEventListener('DOMContentLoaded', function() {
    //      const toggleButton = document.querySelector('.navbar-toggle');
    //      const navbarLinks = document.querySelector('.navbar-links');

    //      toggleButton.addEventListener('click', function() {
    //          if (!navbarLinks.classList.contains('active')) {
    //              navbarLinks.classList.add('active');
    //          } else {
    //              navbarLinks.classList.remove('active');
    //          }
    //      });

    //      document.addEventListener('click', (event) => {
    //          if (!event.target.closest('.navbar')) {
    //              navbarLinks.classList.remove('active');
    //          }
    //      })
    //  });
 </script>
