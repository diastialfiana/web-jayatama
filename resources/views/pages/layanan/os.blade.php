@extends('layouts.app')

@section('title', 'Office Service - Jayatama')
@section('description', 'Layanan Office Service Jayatama, tenaga kerja profesional untuk mendukung administrasi, kebersihan, dan kelancaran operasional kantor.')
@section('keywords', 'Office Service, Jayatama, Office Boy, Kebersihan, Administrasi, Outsourcing')
@section('body-class', 'services-page')

@section('content')
  <main class="main">

    <!-- Page Title -->
  <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }});">
      <div class="container position-relative">
        <h1>Layanan Office Service</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('services') }}">Layanan</a></li>
            <li class="current">Office Service</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Alt Services 2 Section -->
    <section id="office-detail" class="alt-services-2 section"  style="padding: 10px 0;">
      <div class="container">
        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h3>Layanan Office Service Kami</h3>
            <p>Layanan Office Service Jayatama hadir untuk menunjang produktivitas perusahaan Anda dengan personel yang terlatih dan profesional.</p>

            <div class="row">
              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-briefcase flex-shrink-0"></i>
                <div>
                  <h4>Office Support</h4>
                  <p>Dukungan administrasi, distribusi dokumen, dan operasional kantor.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-house-door flex-shrink-0"></i>
                <div>
                  <h4>Kebersihan</h4>
                  <p>Menjaga lingkungan kantor tetap sehat, nyaman, dan produktif.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-people flex-shrink-0"></i>
                <div>
                  <h4>Hospitality</h4>
                  <p>Layanan pantry, penyajian, serta mendukung kenyamanan tamu & karyawan.</p>
                </div>
              </div>

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-award flex-shrink-0"></i>
                <div>
                  <h4>Standar Profesional</h4>
                  <p>Seluruh tenaga kerja mengikuti pelatihan dasar dan evaluasi rutin.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-01 at 16.06.40.jpeg') }}" alt="Office Service Jayatama" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </section>
    <!-- /Alt Services 2 Section -->

    <!-- Features Cards Section -->
    <section id="office-features" class="features-cards section">
      <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
          <h2>Keunggulan Layanan Office Service</h2>
          <p>Jayatama menghadirkan tenaga kerja pendukung kantor yang profesional, terlatih, dan siap mendukung kelancaran aktivitas administrasi maupun kebersihan kantor Anda.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Administrasi Harian</h3>
            <p>Office boy/office girl mendukung tugas administrasi ringan sehingga pekerjaan utama lebih fokus.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Distribusi dokumen</li>
              <li><i class="bi bi-check2"></i> Pengelolaan arsip</li>
              <li><i class="bi bi-check2"></i> Dukungan operasional</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <h3>Kebersihan Kantor</h3>
            <p>Menjaga lingkungan kerja tetap bersih, sehat, dan nyaman dengan standar kebersihan tinggi.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Kebersihan ruang kerja</li>
              <li><i class="bi bi-check2"></i> Pantry & toilet</li>
              <li><i class="bi bi-check2"></i> Pengelolaan sampah</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <h3>Profesional & Ramah</h3>
            <p>Tenaga kerja kami dilatih untuk bersikap sopan, disiplin, serta menjaga kerahasiaan perusahaan.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Sopan & ramah</li>
              <li><i class="bi bi-check2"></i> Etika kerja</li>
              <li><i class="bi bi-check2"></i> Disiplin tinggi</li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h3>Dukungan Teknologi</h3>
            <p>Pengelolaan SDM berbasis sistem digital Jayatama untuk memudahkan monitoring & laporan.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> Absensi digital</li>
              <li><i class="bi bi-check2"></i> Laporan harian</li>
              <li><i class="bi bi-check2"></i> Transparansi layanan</li>
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
                <p class="small">Keamanan profesional</p>
                <a href="{{ route('layanan.security') }}" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
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
  
  /* Service detail card */
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
  
  /* Card styling */
  .card {
    transition: transform 0.3s, box-shadow 0.3s;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
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
  
  /* Border for quality standards */
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