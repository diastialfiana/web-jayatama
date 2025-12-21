<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Jayatama')</title>
  <meta name="description" content="@yield('description', '')">
  <meta name="keywords" content="@yield('keywords', '')">

  <!-- Favicons -->
  <link href="{{ asset('assets/assets/MASTER LOGO JAYATAMA.png') }}" rel="icon">
  <link href="{{ asset('assets/assets/MASTER LOGO JAYATAMA.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  @stack('styles')
</head>

<body class="@yield('body-class', 'index-page')">

  @include('layouts.header')

  <main class="main">
    @yield('content')
  </main>

  @include('layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('scripts')
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('header');
    const isHomePage = window.location.pathname === '/' || window.location.pathname === '/home';
    
    // Add layout class
    if (isHomePage) {
        header.classList.add('home-layout');
    } else {
        header.classList.add('other-layout');
    }
    
    // Mobile menu toggle for other pages
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.other-layout .navmenu');
    
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.classList.toggle('bi-list');
            this.classList.toggle('bi-x');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!navMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
                navMenu.classList.remove('active');
                mobileToggle.classList.add('bi-list');
                mobileToggle.classList.remove('bi-x');
            }
        });
    }
    
    // Untuk AOS initialization
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    
    // Scroll top button
    window.addEventListener('scroll', function() {
        const scrollTop = document.getElementById('scroll-top');
        if (window.scrollY > 100) {
            scrollTop.classList.add('show');
        } else {
            scrollTop.classList.remove('show');
        }
    });
});
</script>
</body>

</html>

<style>
/* Global Styles untuk semua halaman */
.services-page .page-title {
    background-size: cover;
    background-position: center;
    padding: 100px 0 60px;
    position: relative;
    color: white;
}

.services-page .page-title::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
}

.services-page .page-title .container {
    position: relative;
    z-index: 1;
}

.services-page .page-title h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.breadcrumbs {
    padding: 0;
    margin: 0;
    list-style: none;
}

.breadcrumbs ol {
    display: flex;
    flex-wrap: wrap;
    padding: 0;
    margin: 0;
    list-style: none;
}

.breadcrumbs ol li {
    display: flex;
    align-items: center;
}

.breadcrumbs ol li + li::before {
    content: "/";
    display: inline-block;
    margin: 0 10px;
    color: rgba(255, 255, 255, 0.7);
}

.breadcrumbs ol li a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: color 0.3s;
}

.breadcrumbs ol li a:hover {
    color: white;
}

.breadcrumbs ol li.current {
    color: white;
    font-weight: 500;
}

/* Global Layanan Page Styles */
.layanan-page .hero {
    background-size: cover !important;
    background-position: center !important;
    height: 400px !important;
    display: flex !important;
    align-items: center !important;
}

.service-detail-card {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-top: -100px;
    position: relative;
    z-index: 1;
}

.service-detail-card h4 {
    color: #2c3e50;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.related-services .card {
    transition: transform 0.3s;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.related-services .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

/* ========== HEADER CONDITIONAL STYLING ========== */

/* Untuk halaman home: logo besar di tengah */
.header .container-xl {
    position: relative;
}

/* Home layout: Logo di tengah */
.home-layout .logo {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.home-layout .navmenu:first-of-type {
    margin-right: auto;
}

.home-layout .navmenu:last-of-type {
    margin-left: auto;
}

/* Other pages layout: Logo di kanan */
.other-layout .logo {
    margin-right: 20px;
}

.other-layout .navmenu {
    margin-left: auto;
}

/* Mobile view adjustment */
@media (max-width: 1200px) {
    /* Home layout mobile */
    .home-layout .logo {
        position: static;
        transform: none;
        margin: 0 auto;
        order: 1;
    }
    
    .home-layout .navmenu:first-of-type,
    .home-layout .navmenu:last-of-type {
        display: none;
    }
    
    .home-layout .mobile-nav-toggle {
        display: block;
    }
    
    /* Other pages layout mobile */
    .other-layout .logo {
        margin-right: 0;
        order: 1;
    }
    
    .other-layout .navmenu {
        margin-left: 0;
        order: 3;
        display: none;
    }
    
    .other-layout .navmenu.active {
        display: block;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        z-index: 1000;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .other-layout .mobile-nav-toggle {
        order: 2;
        margin-left: auto;
    }
}

/* Mobile toggle positioning */
.mobile-nav-toggle {
        display: block;
    }

/* Logo styling */
.other-layout .logo img {
    height: 60px !important;
}

.home-layout .logo img {
    height: 100px !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .service-detail-card {
        padding: 20px;
        margin-top: -50px;
    }
    
    .layanan-page .hero {
        height: 300px !important;
    }
    
    .hero h1 {
        font-size: 2rem;
    }
    
    .services-page .page-title {
        padding: 80px 0 40px;
    }
    
    .services-page .page-title h1 {
        font-size: 2rem;
    }
    
    .breadcrumbs ol {
        font-size: 0.9rem;
    }
}

/* AOS animation delay classes */
[data-aos-delay="100"] {
    transition-delay: 100ms;
}

[data-aos-delay="200"] {
    transition-delay: 200ms;
}

[data-aos-delay="300"] {
    transition-delay: 300ms;
}

[data-aos-delay="400"] {
    transition-delay: 400ms;
}

[data-aos-delay="500"] {
    transition-delay: 500ms;
}

/* Preloader styling */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #fff;
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Scroll top button */
#scroll-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 1000;
}

#scroll-top.show {
    opacity: 1;
}

/* Active menu item styling */
.navmenu ul li a.active {
    color: #007bff !important;
    font-weight: 600;
}

/* Dropdown menu styling */
.navmenu .dropdown ul {
    background: white;
    border-radius: 5px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.navmenu .dropdown ul li a {
    padding: 8px 20px;
    color: #333;
}

.navmenu .dropdown ul li a:hover {
    background-color: #f8f9fa;
    color: #007bff;
}
</style>