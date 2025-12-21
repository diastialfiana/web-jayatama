@extends('layouts.app')

@section('title', 'Driver - Jayatama')
@section('description', 'Layanan Driver Jayatama, tenaga pengemudi profesional untuk mendukung operasional perusahaan dengan aman, nyaman, dan tepat waktu.')
@section('keywords', 'Driver, Sopir, Jayatama, Tenaga Kerja, Outsourcing')
@section('body-class', 'services-page')

@section('content')
  <main class="main">

    <!-- Page Title -->
   <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }});">
      <div class="container position-relative">
        <h1>Layanan Driver</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('services') }}">Layanan</a></li>
            <li class="current">Driver</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Alt Services 2 Section -->
    <section id="driver-detail" class="alt-services-2 section" style="padding: 10px 0;">
      <div class="container">
        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h3>Layanan Driver Kami</h3>
            <p>Jayatama menghadirkan tenaga driver dengan standar profesional, siap mendukung mobilitas perusahaan maupun personal dengan layanan aman, nyaman, dan terpercaya.</p>

            <div class="row">
              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-car-front flex-shrink-0"></i>
                <div>
                  <h4>Eksekutif & VIP</h4>
                  <p>Driver khusus untuk eksekutif dengan standar layanan premium.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-truck flex-shrink-0"></i>
                <div>
                  <h4>Operasional Perusahaan</h4>
                  <p>Mendukung pengiriman barang ringan & mobilitas staf perusahaan.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-calendar-event flex-shrink-0"></i>
                <div>
                  <h4>Event & Tamu</h4>
                  <p>Layanan pengemudi untuk kebutuhan acara khusus & tamu perusahaan.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Wilayah Nasional</h4>
                  <p>Siap ditempatkan di berbagai kota besar di Indonesia.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('assets/assets/driver1.jpg') }}" alt="Driver Jayatama" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!-- /Alt Services 2 Section -->

    <!-- Features Cards Section -->
    <section id="driver-features" class="features-cards section">
      <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
          <h2>Keunggulan Layanan Driver Jayatama</h2>
          <p>Jayatama menyediakan tenaga pengemudi profesional untuk mendukung mobilitas perusahaan Anda dengan aman, nyaman, dan tepat waktu.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Pengemudi Profesional</h3>
            <p>Driver berpengalaman dengan keahlian mengemudi di berbagai jenis kendaraan.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Berlisensi resmi</li>
              <li><i class="bi bi-check2"></i> Disiplin & bertanggung jawab</li>
              <li><i class="bi bi-check2"></i> Mengutamakan keselamatan</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <h3>Kenyamanan & Keamanan</h3>
            <p>Fokus memberikan kenyamanan perjalanan dan keamanan bagi eksekutif maupun staf.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Ramah & komunikatif</li>
              <li><i class="bi bi-check2"></i> Menguasai SOP perjalanan</li>
              <li><i class="bi bi-check2"></i> Sigap dalam keadaan darurat</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <h3>Fleksibilitas Tugas</h3>
            <p>Melayani kebutuhan transportasi harian maupun perjalanan dinas khusus.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Perjalanan eksekutif</li>
              <li><i class="bi bi-check2"></i> Operasional perusahaan</li>
              <li><i class="bi bi-check2"></i> Event & tamu VIP</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h3>Wilayah Luas</h3>
            <p>Siap bertugas di seluruh wilayah Indonesia dengan dukungan jaringan Jayatama.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Domisili lokal & nasional</li>
              <li><i class="bi bi-check2"></i> Familiar dengan rute kota besar</li>
              <li><i class="bi bi-check2"></i> Dukungan pusat komando</li>
            </ul>
          </div>
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
                <i class="bi bi-shield-check display-4 text-primary mb-3"></i>
                <h5 class="card-title">Security</h5>
                <p class="small">Keamanan profesional untuk bisnis Anda</p>
                <a href="{{ route('layanan.security') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-6 mb-4">
            <div class="card text-center h-100 border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-building display-4 text-primary mb-3"></i>
                <h5 class="card-title">Office Service</h5>
                <p class="small">Kebersihan & kenyamanan kantor</p>
                <a href="{{ route('layanan.os') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
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
                <i class="bi bi-p-circle display-4 text-primary mb-3"></i>
                <h5 class="card-title">JP Parking</h5>
                <p class="small">Manajemen parkir terintegrasi</p>
                <a href="{{ route('layanan.parking') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
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
  
  .service-detail-card {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
  
  .card {
    transition: transform 0.3s, box-shadow 0.3s;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }
  
  @media (max-width: 768px) {
    .services-page .page-title {
      padding: 80px 0 40px;
    }
    
    .services-page .page-title h1 {
      font-size: 2rem;
    }
    
    .service-detail-card {
      padding: 20px;
      margin-top: -30px;
    }
    
    .icon-box {
      margin-bottom: 15px;
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
</script>
@endpush