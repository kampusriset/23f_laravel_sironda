@extends('layouts.landing')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Selamat Datang di SiRonda</h1>
                <p>SiRonda adalah aplikasi yang dirancang untuk membantu Anda mengelola dan memantau keamanan lingkungan anda dengan lebih baik. Dengan fitur-fitur canggih dan antarmuka yang ramah pengguna.</p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <h3>Monitoring Real-time</h3>
                        <p>Pantau aktivitas ronda secara langsung dengan update real-time</p>
                    </div>
                    <div class="feature-card">
                        <h3>Notifikasi Penting</h3>
                        <p>Dapatkan pemberitahuan instan untuk kejadian yang memerlukan perhatian</p>
                    </div>
                    <div class="feature-card">
                        <h3>Analisis Data</h3>
                        <p>Analisis mendalam untuk meningkatkan efektivitas sistem keamanan</p>
                    </div>
                    <div class="feature-card">
                        <h3>Integrasi Perangkat</h3>
                        <p>Terintegrasi dengan berbagai perangkat keamanan modern</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 400'><rect fill='%23667eea' width='500' height='400' rx='10'/><circle fill='white' cx='250' cy='150' r='50' opacity='0.9'/><rect fill='white' x='200' y='220' width='100' height='8' rx='4' opacity='0.8'/><rect fill='white' x='180' y='240' width='140' height='6' rx='3' opacity='0.6'/><rect fill='white' x='210' y='260' width='80' height='6' rx='3' opacity='0.6'/><circle fill='%23764ba2' cx='100' cy='100' r='20' opacity='0.7'/><circle fill='%23764ba2' cx='400' cy='300' r='25' opacity='0.7'/></svg>" alt="Security Monitoring Interface">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section features-section">
        <h2 class="section-title">Fitur Unggulan</h2>
        <div class="features-container">
            <div class="feature-item">
                <div class="feature-icon">📱</div>
                <h3>Mobile Friendly</h3>
                <p>Aplikasi dapat diakses melalui smartphone, tablet, atau desktop dengan tampilan yang responsif dan user-friendly</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🔔</div>
                <h3>Smart Notifications</h3>
                <p>Sistem notifikasi cerdas yang memberikan peringatan tepat waktu untuk situasi yang memerlukan perhatian khusus</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">📊</div>
                <h3>Analytics Dashboard</h3>
                <p>Dashboard analitik lengkap dengan grafik dan laporan visual untuk memudahkan monitoring dan evaluasi</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🛡️</div>
                <h3>Keamanan Terjamin</h3>
                <p>Sistem keamanan berlapis dengan enkripsi data dan autentikasi multi-level untuk melindungi informasi sensitif</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🌐</div>
                <h3>Cloud Integration</h3>
                <p>Integrasi cloud untuk backup otomatis, sinkronisasi data, dan aksesibilitas dari mana saja</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">⚡</div>
                <h3>Real-time Updates</h3>
                <p>Update data secara real-time dengan teknologi WebSocket untuk informasi yang selalu akurat dan terkini</p>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-kerja" class="section how-it-works">
        <h2 class="section-title">Cara Kerja SiRonda</h2>
        <div class="steps-container">
            <div class="step-item">
                <div class="step-number">1</div>
                <h3>Registrasi & Setup</h3>
                <p>Daftarkan wilayah Anda dan atur konfigurasi sistem sesuai kebutuhan keamanan lingkungan</p>
            </div>
            <div class="step-item">
                <div class="step-number">2</div>
                <h3>Penugasan Petugas</h3>
                <p>Tambahkan petugas ronda dan atur jadwal patroli berdasarkan zona dan waktu yang telah ditentukan</p>
            </div>
            <div class="step-item">
                <div class="step-number">3</div>
                <h3>Monitoring Aktif</h3>
                <p>Pantau aktivitas ronda secara real-time melalui dashboard dan terima notifikasi untuk setiap kejadian</p>
            </div>
            <div class="step-item">
                <div class="step-number">4</div>
                <h3>Analisis & Laporan</h3>
                <p>Evaluasi efektivitas sistem dengan laporan komprehensif dan rekomendasi perbaikan</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <h2>Siap Meningkatkan Keamanan Lingkungan Anda?</h2>
        <p>Bergabunglah dengan ribuan komunitas yang telah mempercayai SiRonda untuk sistem keamanan mereka</p>
        <div class="cta-buttons">
            <a href="#" class="btn btn-primary">Mulai Sekarang</a>
            <a href="#" class="btn btn-secondary">Hubungi Kami</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SiRonda</h3>
                <p>Sistem Informasi Ronda terdepan untuk keamanan lingkungan yang lebih baik dan terorganisir.</p>
            </div>
            <div class="footer-section">
                <h3>Fitur</h3>
                <a href="#">Monitoring Real-time</a>
                <a href="#">Notifikasi Smart</a>
                <a href="#">Analytics Dashboard</a>
                <a href="#">Mobile App</a>
            </div>
            <div class="footer-section">
                <h3>Dukungan</h3>
                <a href="#">Dokumentasi</a>
                <a href="#">Tutorial</a>
                <a href="#">FAQ</a>
                <a href="#">Support 24/7</a>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <p>📧 info@sironda.com</p>
                <p>📞 +62 21 1234 5678</p>
                <p>📍 Jakarta, Indonesia</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 SiRonda. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <!-- Floating Action Button -->
    <div class="floating-action" onclick="scrollToTop()">
        ↑
    </div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide floating action button based on scroll position
        window.addEventListener('scroll', function() {
            const floatingBtn = document.querySelector('.floating-action');
            if (window.pageYOffset > 300) {
                floatingBtn.style.opacity = '1';
                floatingBtn.style.visibility = 'visible';
            } else {
                floatingBtn.style.opacity = '0';
                floatingBtn.style.visibility = 'hidden';
            }
        });

        // Add loading animation to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 100);
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'white';
                navbar.style.backdropFilter = 'none';
            }
        });
</script>
@endsection