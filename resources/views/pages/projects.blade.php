@extends('layouts.app')

@section('title', 'Solusi Bisnis - Jayatama')
@section('description', 'Solusi tenaga kerja profesional untuk berbagai sektor industri: Perbankan & Keuangan, Retail & Lifestyle, Media & Event, Hotel, Properti & Fasilitas Gedung')
@section('keywords', 'solusi bisnis Jayatama, tenaga kerja perbankan, layanan retail, solusi media event, manajemen properti')
@section('body-class', 'projects-page')

@section('content')
<main class="main" style="padding-top: 80px;">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/assets/Galeri/PANO_20201210_101408.jpg') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>Solusi Tenaga Kerja untuk Bisnis Anda</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Solusi Bisnis</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Solusi untuk Anda - Perbankan & Keuangan -->
    <section id="solusi-banking" class="alt-services section">
        <div class="container">
            <div class="row justify-content-between gy-4 align-items-center">
                <!-- Konten teks -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3><i class="bi bi-bank me-2"></i> Perbankan & Keuangan</h3>
                    <h5>Keamanan cabang & operasional harian</h5>
                    <p>
                        Menjaga transaksi tetap aman, mendukung mobilitas dengan driver & messenger, 
                        serta menciptakan lingkungan kerja yang bersih dan nyaman bagi nasabah maupun karyawan.
                    </p>
                    <div class="mt-4">
                        <h6>Layanan yang kami sediakan:</h6>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i> Security Profesional</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Office Service & Cleaning</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Driver & Messenger</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Teknisi ME</li>
                        </ul>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-03 at 14.23.50 (3).jpeg') }}" alt="Solusi Perbankan & Keuangan" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Solusi untuk Anda - Retail & Lifestyle -->
    <section id="solusi-retail" class="alt-services section bg-light">
        <div class="container">
            <div class="row justify-content-between gy-4 align-items-center">
                <!-- Gambar -->
                <div class="col-lg-5 order-1 order-lg-1" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('assets/assets/layanan kami/parking2.jpg') }}" alt="Solusi Retail & Lifestyle" class="img-fluid rounded shadow">
                </div>

                <!-- Konten teks -->
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <h3><i class="bi bi-shop me-2"></i> Retail & Lifestyle</h3>
                    <h5>Meningkatkan pengalaman pelanggan</h5>
                    <p>
                        Dengan security, office service, cleaning service, dan pengelolaan parkir, 
                        Jayatama memastikan toko maupun pusat perbelanjaan berjalan aman, rapi, dan nyaman 
                        sehingga menciptakan pengalaman positif bagi pelanggan.
                    </p>
                    <div class="mt-4">
                        <h6>Layanan yang kami sediakan:</h6>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i> Security Mall & Retail</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Cleaning Service</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> JP Parking Management</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Office Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Solusi Retail -->

    <!-- Solusi untuk Anda - Media & Event -->
    <section id="solusi-media" class="alt-services section">
        <div class="container">
            <div class="row justify-content-between gy-4 align-items-center">
                <!-- Konten teks -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3><i class="bi bi-camera-video me-2"></i> Media & Event</h3>
                    <h5>Dukungan penuh untuk produksi & acara</h5>
                    <p>
                        Jayatama menghadirkan tenaga security event, waiter, food & beverage, hingga messenger 
                        untuk mendukung kelancaran kegiatan media dan acara, baik skala kecil maupun besar. 
                        Tim kami siap sigap, profesional, dan responsif di lapangan.
                    </p>
                    <div class="mt-4">
                        <h6>Layanan yang kami sediakan:</h6>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i> Event Security</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Food & Beverage Service</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Messenger & Logistics</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Office Support</li>
                        </ul>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/layanan kami/fnb2.jpg') }}" alt="Solusi Media & Event" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
    <!-- End Solusi Media & Event -->

    <!-- Solusi untuk Anda - Hotel, Properti & Fasilitas Gedung -->
    <section id="solusi-properti" class="alt-services section bg-light">
        <div class="container">
            <div class="row justify-content-between gy-4 align-items-center">
                <!-- Gambar -->
                <div class="col-lg-5 order-1 order-lg-1" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-01 at 16.06.36.jpeg') }}" alt="Solusi Hotel, Properti & Fasilitas Gedung" class="img-fluid rounded shadow">
                </div>

                <!-- Konten teks -->
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <h3><i class="bi bi-building me-2"></i> Hotel, Properti & Fasilitas Gedung</h3>
                    <h5>Perawatan & layanan operasional profesional</h5>
                    <p>
                        Jayatama menyediakan tenaga kerja terlatih untuk mendukung kelancaran operasional hotel dan properti, 
                        mulai dari gondola man, building support, teknisi ME, hingga cleaning service. 
                        Kami memastikan fasilitas tetap terawat, aman, dan memberikan kenyamanan terbaik bagi tamu maupun penghuni.
                    </p>
                    <div class="mt-4">
                        <h6>Layanan yang kami sediakan:</h6>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i> Gondola Man</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Teknisi ME</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Building Support</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i> Cleaning Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Solusi Hotel, Properti & Fasilitas Gedung -->
</main>
@endsection

@push('styles')
<style>
    .projects-page .page-title {
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px;
        position: relative;
        color: white;
    }

    .projects-page .page-title::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .projects-page .page-title .container {
        position: relative;
        z-index: 1;
    }

    .projects-page .page-title h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    /* Breadcrumbs */
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

    .breadcrumbs ol li+li::before {
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

    /* Alt Services Sections */
    .alt-services {
        padding: 80px 0;
    }

    .alt-services h3 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.8rem;
        font-weight: 600;
    }

    .alt-services h5 {
        color: #007bff;
        margin-bottom: 20px;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .alt-services p {
        color: #666;
        margin-bottom: 25px;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .alt-services ul li {
        margin-bottom: 8px;
        color: #555;
    }

    .alt-services h6 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .alt-services .bg-light {
        background-color: #f8f9fa !important;
    }

    /* CTA Section */
    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-primary .btn-light {
        background-color: white;
        color: #007bff;
        border: none;
        padding: 12px 35px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .bg-primary .btn-light:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Image styling */
    .alt-services img {
        transition: transform 0.3s;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .alt-services img:hover {
        transform: scale(1.02);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .projects-page .page-title {
            padding: 80px 0 40px;
        }

        .projects-page .page-title h1 {
            font-size: 2rem;
        }

        .alt-services {
            padding: 60px 0;
        }

        .alt-services h3 {
            font-size: 1.6rem;
        }

        .alt-services h5 {
            font-size: 1.1rem;
        }

        .alt-services p {
            font-size: 1rem;
        }

        .breadcrumbs ol {
            font-size: 0.9rem;
        }

        .alt-services .col-lg-5,
        .alt-services .col-lg-6 {
            text-align: center;
            margin-bottom: 30px;
        }

        .alt-services img {
            margin: 0 auto;
        }

        .order-1,
        .order-2 {
            order: 0 !important;
        }
    }

    @media (max-width: 576px) {
        .projects-page .page-title {
            padding: 60px 0 30px;
        }

        .projects-page .page-title h1 {
            font-size: 1.75rem;
        }

        .alt-services h3 {
            font-size: 1.4rem;
        }

        .alt-services h5 {
            font-size: 1rem;
        }

        .breadcrumbs ol {
            font-size: 0.8rem;
        }

        .bg-primary .btn-light {
            padding: 10px 25px;
            font-size: 1rem;
        }
    }

    /* Smooth scroll offset for fixed header */
    section {
        scroll-margin-top: 100px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerHeight = document.querySelector('#header').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
@endpush