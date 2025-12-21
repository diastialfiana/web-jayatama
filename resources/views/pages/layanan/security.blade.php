@extends('layouts.app')

@section('title', 'Security - Jayatama')
@section('description', 'Layanan Security Jayatama, tenaga keamanan profesional dengan sertifikasi resmi untuk menjaga keamanan aset, SDM, dan lingkungan kerja Anda.')
@section('keywords', 'Security, Pengamanan, Jayatama, Manned Guarding, Event Security, Close Protection')
@section('body-class', 'services-page')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }});">
        <div class="container position-relative">
            <h1>Layanan Security</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('services') }}">Layanan</a></li>
                    <li class="current">Security</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Alt Services 2 Section - Security Detail -->
    <section id="security-detail" class="alt-services-2 section" style="padding: 10px 0;">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Layanan Pengamanan Kami</h3>
                    <p>Jayatama menghadirkan beragam layanan pengamanan sesuai kebutuhan klien, mulai dari perkantoran,
                        pusat perbelanjaan, event, hingga pengawalan VIP.</p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-lock flex-shrink-0"></i>
                            <div>
                                <h4>Manned Guarding</h4>
                                <p>Penempatan personel keamanan di lokasi klien untuk penjagaan 24/7.</p>
                            </div>
                        </div>
                        <!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-people flex-shrink-0"></i>
                            <div>
                                <h4>Event Security</h4>
                                <p>Pengamanan acara dengan crowd control, pemeriksaan, dan evakuasi darurat.</p>
                            </div>
                        </div>
                        <!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-person-badge flex-shrink-0"></i>
                            <div>
                                <h4>Close Protection</h4>
                                <p>Layanan pengawalan untuk VIP & eksekutif dengan tim profesional.</p>
                            </div>
                        </div>
                        <!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-building-check flex-shrink-0"></i>
                            <div>
                                <h4>Corporate & Property Security</h4>
                                <p>Pengamanan area gedung, perkantoran, dan fasilitas vital perusahaan.</p>
                            </div>
                        </div>
                        <!-- End Icon Box -->
                    </div>
                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-03 at 14.23.50 (3).jpeg') }}"
                        alt="Security Jayatama" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- /Alt Services 2 Section -->

    <!-- Features Cards Section - Security -->
    <section id="security-features" class="features-cards section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <h2>Keunggulan Layanan Security Jayatama</h2>
                <p>Kami menghadirkan tenaga pengamanan profesional dengan standar tinggi untuk menjaga keamanan aset,
                    SDM, dan lingkungan kerja Anda.</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h3>Tenaga Terlatih</h3>
                    <p>Seluruh personel mengikuti pelatihan resmi dan memiliki sertifikasi Gada Pratama, Madya, maupun
                        Utama.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> Standar Kepolisian RI</li>
                        <li><i class="bi bi-check2"></i> Sertifikasi resmi</li>
                        <li><i class="bi bi-check2"></i> Mental & fisik prima</li>
                    </ul>
                </div>
                <!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <h3>Pengalaman Luas</h3>
                    <p>Berpengalaman melayani sektor perbankan, retail, media, hingga fasilitas gedung di seluruh
                        Indonesia.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> Ribuan tenaga kerja aktif</li>
                        <li><i class="bi bi-check2"></i> Jaringan 10 regional</li>
                        <li><i class="bi bi-check2"></i> Didukung JIS monitoring</li>
                    </ul>
                </div>
                <!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h3>Responsif & Disiplin</h3>
                    <p>Tim security kami siap menghadapi keadaan darurat dengan SOP yang jelas dan koordinasi cepat.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> Patroli rutin</li>
                        <li><i class="bi bi-check2"></i> Kontrol akses</li>
                        <li><i class="bi bi-check2"></i> Penanganan darurat</li>
                    </ul>
                </div>
                <!-- End feature item-->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <h3>Dukungan Teknologi</h3>
                    <p>Pengelolaan SDM berbasis <b>Jayatama Information System (JIS)</b> untuk monitoring real-time.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2"></i> Absensi online</li>
                        <li><i class="bi bi-check2"></i> Laporan harian digital</li>
                        <li><i class="bi bi-check2"></i> Transparansi layanan</li>
                    </ul>
                </div>
                <!-- End feature item-->
            </div>
        </div>
    </section>
    <!-- /Features Cards Section -->

    <!-- Related Services -->
    <section class="section">
        <div class="container">
            <h3 class="text-center mb-5">Layanan Lainnya</h3>
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-briefcase display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Office Service</h5>
                            <p class="small">Dukungan administrasi</p>
                            <a href="{{ route('layanan.os') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-car-front-fill display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Driver</h5>
                            <p class="small">Pengemudi profesional</p>
                            <a href="{{ route('layanan.driver') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-envelope-paper display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Messenger</h5>
                            <p class="small">Pengiriman cepat & aman</p>
                            <a href="{{ route('layanan.messenger') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-tools display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Teknisi</h5>
                            <p class="small">Perawatan & perbaikan</p>
                            <a href="{{ route('layanan.teknisi') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-cup-straw display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Food & Beverage</h5>
                            <p class="small">Makanan & minuman</p>
                            <a href="{{ route('layanan.fnb') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-p-circle display-4 text-primary mb-3"></i>
                            <h5 class="card-title">JP Parking</h5>
                            <p class="small">Manajemen parkir</p>
                            <a href="{{ route('layanan.parking') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card text-center h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-building display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Gondola</h5>
                            <p class="small">Pembersihan gedung tinggi</p>
                            <a href="{{ route('layanan.gondola') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Related Services -->

</main>
@endsection

@push('styles')
<style>
    /* Services page specific */
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

    /* Service detail card */
    .service-detail-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-top: -50px;
        position: relative;
        z-index: 1;
    }

    .service-detail-card h4 {
        color: #2c3e50;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    /* Icon boxes */
    .icon-box {
        margin-bottom: 20px;
    }

    .icon-box i {
        font-size: 24px;
        color: #007bff;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .icon-box h4 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .icon-box p {
        margin: 0;
        color: #666;
    }

    /* Features cards */
    .features-cards h3 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    .features-cards ul li {
        margin-bottom: 8px;
        display: flex;
        align-items: flex-start;
    }

    .features-cards ul li i {
        color: #28a745;
        margin-right: 10px;
        margin-top: 3px;
    }

    /* Security specific styling */
    .security-services .icon-box i {
        color: #dc3545;
    }

    /* Card styling */
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    /* Table styling */
    .table th {
        background-color: #f8f9fa;
    }

    .table-primary {
        background-color: #007bff !important;
        color: white;
    }

    .table-primary th {
        background-color: #007bff !important;
        color: white;
        border-color: #0056b3;
    }

    /* Area pelayanan */
    .border {
        border: 1px solid #dee2e6 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .service-detail-card {
            padding: 20px;
            margin-top: -30px;
        }

        .services-page .page-title {
            padding: 80px 0 40px;
        }

        .services-page .page-title h1 {
            font-size: 2rem;
        }

        .icon-box {
            margin-bottom: 15px;
        }

        .features-cards .col-lg-3 {
            margin-bottom: 30px;
        }

        .breadcrumbs ol {
            font-size: 0.9rem;
        }

        .table-responsive {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .service-detail-card {
            padding: 15px;
        }

        .icon-box {
            flex-direction: column;
            text-align: center;
        }

        .icon-box i {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .features-cards h3 {
            font-size: 1.1rem;
        }

        .service-detail-card h4 {
            font-size: 1.25rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // AOS initialization
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
@endpush