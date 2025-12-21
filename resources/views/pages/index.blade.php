@extends('layouts.app')

@section('title', 'Jayatama - Solusi Tenaga Kerja Profesional')
@section('description', 'PT Jasa Swadaya Utama (Jayatama) adalah penyedia tenaga kerja profesional dengan konsep sentralisasi pelayanan dan pengamanan terintegrasi untuk seluruh unit usaha grup CT Corp.')
@section('keywords', 'Jayatama, Tenaga Kerja, Security, Office Service, Driver, Teknisi, Messenger, Parking, Gondola, CT Corp')
@section('body-class', 'index-page')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <h2>Solusi Tenaga Kerja Profesional</h2>
                        <p>
                            Sejak 1 Mei 2012, PT Jasa Swadaya Utama hadir sebagai penyedia tenaga kerja profesional
                            dengan konsep sentralisasi pelayanan dan pengamanan terintegrasi untuk seluruh unit usaha
                            grup CT Corp.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active">
                <img src="{{ asset('assets/assets/security6.jpg') }}" alt="Security Services">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/assets/security4.jpg') }}" alt="Professional Team">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/assets/security3.jpg') }}" alt="Office Service">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/assets/security7.jpg') }}" alt="Building Security">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/assets/security5.jpg') }}" alt="Team Work">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section><!-- /Hero Section -->

    <!-- Alt Services Section -->
    <section id="alt-services" class="alt-services section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/assets/about.png') }}" alt="Jayatama Vision" class="img-fluid rounded">
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up"
                    data-aos-delay="200">
                    <h3>JAYATAMA GO TO WORLD CLASS</h3>
                    <p>TERUS BERINOVASI MENJADI PERUSAHAAN JASA PELAYANAN DAN KEAMANAN YANG UNGGUL, TERDEPAN DAN
                        BERKUALITAS DILINGKUNGAN CTCORP</p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Komitmen Unggul</a></h4>
                            <p>Kami berkomitmen untuk memberikan layanan terbaik dengan standar tertinggi, demi
                                menciptakan lingkungan yang aman, profesional, dan terpercaya di setiap lini operasional.
                            </p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Integritas Tanpa Kompromi</a></h4>
                            <p>Kepercayaan adalah fondasi kami. Setiap tindakan dan layanan yang kami berikan selalu
                                mengedepankan integritas, transparansi, dan tanggung jawab penuh.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Inovasi Berkelanjutan</a></h4>
                            <p>Jayatama terus beradaptasi dengan perkembangan zaman, mengintegrasikan teknologi dan
                                solusi terbaru demi meningkatkan efisiensi dan kualitas pelayanan.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Sumber Daya Berkualitas</a></h4>
                            <p>Kami percaya bahwa SDM adalah aset utama. Melalui pelatihan rutin dan standar rekrutmen
                                yang ketat, kami menghadirkan tim yang profesional, terlatih, dan siap menjawab setiap
                                tantangan.</p>
                        </div>
                    </div><!-- End Icon Box -->
                </div>
            </div>
        </div>
    </section><!-- /Alt Services Section -->

    <!-- Constructions Section -->
    <section id="constructions" class="constructions section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan Kami</h2>
            <p>Mendukung seluruh unit usaha dengan tenaga kerja berkualitas dan layanan terintegrasi</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/security1.jpg') }}" alt="Security">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Security</h4>
                                    <p>
                                        Petugas keamanan profesional yang telah melalui pelatihan standar nasional dan
                                        memiliki sertifikasi resmi. Siap menjaga keamanan aset, karyawan, dan lingkungan
                                        kerja dengan prosedur pengamanan yang terukur dan terkoordinasi.
                                    </p>
                                    <a href="{{ route('layanan.security') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/os.jpg') }}" alt="Office Service">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Office Service</h4>
                                    <p>
                                        Layanan kebersihan menyeluruh yang mencakup perawatan ruang kerja, area publik,
                                        dan fasilitas pendukung. Menjamin lingkungan kerja yang bersih, sehat, dan nyaman
                                        sesuai standar kebersihan profesional.
                                    </p>
                                    <a href="{{ route('layanan.os') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/me.jpg') }}" alt="Teknisi">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Teknisi</h4>
                                    <p>
                                        Teknisi berpengalaman dan bersertifikat yang menangani perawatan, perbaikan, dan
                                        troubleshooting berbagai peralatan serta infrastruktur pendukung operasional
                                        perusahaan.
                                    </p>
                                    <a href="{{ route('layanan.teknisi') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/gondola.jpg') }}" alt="Gondolaman">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Gondolaman</h4>
                                    <p>
                                        Operator gondola bersertifikat dengan keahlian khusus dalam pembersihan kaca dan
                                        fasad gedung tinggi. Mengutamakan keselamatan kerja dan hasil pembersihan yang
                                        optimal.
                                    </p>
                                    <a href="{{ route('layanan.gondola') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/messanger2.jpg') }}" alt="Messenger">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Messenger</h4>
                                    <p>
                                        Layanan pengiriman dokumen dan barang dengan cepat, aman, dan tepat waktu.
                                        Didukung sistem koordinasi yang efisien untuk memastikan setiap pengiriman
                                        mendukung kelancaran operasional perusahaan.
                                    </p>
                                    <a href="{{ route('layanan.messenger') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/driver2.jpg') }}" alt="Driver">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Driver</h4>
                                    <p>
                                        Pengemudi profesional yang berpengalaman dan memiliki lisensi resmi. Siap
                                        mendukung mobilitas karyawan, antar-jemput tamu, dan distribusi barang dengan
                                        mengutamakan ketepatan waktu, kenyamanan, serta keselamatan perjalanan.
                                    </p>
                                    <a href="{{ route('layanan.driver') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/parking2.jpg') }}" alt="Parking">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Parking</h4>
                                    <p>
                                        Layanan pengelolaan parkir yang profesional, tertib, dan aman. Didukung oleh
                                        petugas terlatih dalam mengatur lalu lintas kendaraan, menjaga keamanan area
                                        parkir, serta memberikan kenyamanan bagi karyawan maupun tamu perusahaan.
                                    </p>
                                    <a href="{{ route('layanan.parking') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg">
                                    <img src="{{ asset('assets/assets/layanan kami/fnb2.jpg') }}" alt="Food & Beverage">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">Food & Beverage</h4>
                                    <p>
                                        Layanan makanan dan minuman higienis dan berkualitas untuk mendukung operasional
                                        perusahaan. Mengutamakan cita rasa, kebersihan, dan ketepatan penyajian bagi
                                        karyawan dan tamu.
                                    </p>
                                    <a href="{{ route('layanan.fnb') }}" class="btn btn-sm btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->
            </div>
        </div>
    </section><!-- /Constructions Section -->

    <!-- Alt Services 2 Section -->
    <section id="alt-services-2" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Keunggulan Kami</h3>
                    <p>Jayatama hadir sebagai mitra terpercaya dalam layanan alih daya dengan dukungan tenaga terlatih,
                        sistem terintegrasi, serta jangkauan operasional nasional.</p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-award flex-shrink-0"></i>
                            <div>
                                <h4>Berpengalaman</h4>
                                <p>Sejak 2012 dipercaya mengelola ribuan tenaga kerja di ekosistem CT Corp.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-patch-check flex-shrink-0"></i>
                            <div>
                                <h4>Bersertifikat</h4>
                                <p>Seluruh personel telah terlatih dan memiliki sertifikasi sesuai bidangnya.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-cpu flex-shrink-0"></i>
                            <div>
                                <h4>Terdepan Teknologi</h4>
                                <p>Menggunakan sistem informasi manajemen berbasis web & mobile untuk monitoring
                                    real-time.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-globe flex-shrink-0"></i>
                            <div>
                                <h4>Jaringan Nasional</h4>
                                <p>Memiliki 10 regional dengan jangkauan ke seluruh Indonesia.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/keunggulan_kami/keunggulan_kami.JPG') }}" alt="Keunggulan Jayatama"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section><!-- /Alt Services 2 Section -->

    <!-- Projects Section -->
    <section id="projects" class="projects section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Partner Kami</h2>
            <p>Terpercaya dalam mendukung operasional CT Corp</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <!-- Filter options can be added here if needed -->
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- Partner Logos -->
                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo1.png') }}" class="img-fluid partner-logo"
                                alt="Partner 1">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo2.png') }}" class="img-fluid partner-logo"
                                alt="Partner 2">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo3.png') }}" class="img-fluid partner-logo"
                                alt="Partner 3">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo4.png') }}" class="img-fluid partner-logo"
                                alt="Partner 4">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo6.png') }}" class="img-fluid partner-logo"
                                alt="Partner 5">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo7.png') }}" class="img-fluid partner-logo"
                                alt="Partner 6">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/logo8.png') }}" class="img-fluid partner-logo"
                                alt="Partner 7">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo11.jpg') }}" class="img-fluid partner-logo"
                                alt="Partner 8">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo90.png') }}" class="img-fluid partner-logo"
                                alt="Partner 9">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo13.webp') }}" class="img-fluid partner-logo"
                                alt="Partner 10">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo14.png') }}" class="img-fluid partner-logo"
                                alt="Partner 11">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo15.jpg') }}" class="img-fluid partner-logo"
                                alt="Partner 12">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo16.jpg') }}" class="img-fluid partner-logo"
                                alt="Partner 13">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo17.png') }}" class="img-fluid partner-logo"
                                alt="Partner 14">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo18.jpg') }}" class="img-fluid partner-logo"
                                alt="Partner 15">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/assets/partner kami/logo19.png') }}" class="img-fluid partner-logo"
                                alt="Partner 16">
                        </div>
                    </div>
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Projects Section -->

        <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita Terbaru</h2>
            <p>Artikel dan informasi terkini dari Jayatama tentang kegiatan perusahaan, layanan, dan perkembangan terbaru.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                @forelse($recentBlogs as $blog)
                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset($blog['image']) }}" class="img-fluid" alt="{{ $blog['title'] }}">
                            <span class="post-date">{{ date('d M', strtotime($blog['created_at'])) }}</span>
                        </div>
                        <div class="post-content d-flex flex-column">
                            <h3 class="post-title">{{ $blog['title'] }}</h3>
                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> 
                                    <span class="ps-2">{{ $blog['author'] }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> 
                                    <span class="ps-2">{{ $blog['category'] }}</span>
                                </div>
                            </div>
                            <p class="excerpt small text-muted mb-3">
                                {{ Str::limit($blog['excerpt'], 100) }}
                            </p>
                            <hr>
                            <a href="{{ route('blog.show', $blog['slug']) }}" class="readmore stretched-link">
                                <span>Baca Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End post item -->
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-newspaper display-1 text-muted mb-4"></i>
                            <h3 class="mb-3">Belum ada berita</h3>
                            <p class="text-muted mb-4">Nantikan artikel dan informasi terbaru dari Jayatama.</p>
                            @if(session('admin_logged_in'))
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                            </a>
                            @else
                            <a href="{{ route('blog') }}" class="btn btn-outline-primary">
                                <i class="bi bi-newspaper me-2"></i>Lihat Halaman Berita
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforelse

                <!-- CTA untuk melihat semua berita -->
                @if(count($recentBlogs) > 0)
                <div class="col-12 text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('blog') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-newspaper me-2"></i>Lihat Semua Berita
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section><!-- /Recent Blog Posts Section -->

    <!-- Stats Counter Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title text-center mb-5" data-aos="fade-up">
                <h2>Statistik Jayatama</h2>
                <p>Pencapaian kami dalam angka</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-box">
                        <i class="bi bi-buildings display-4 text-primary mb-3"></i>
                        <h3 class="counter" data-target="46">0</h3>
                        <p>Klien Aktif</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-box">
                        <i class="bi bi-journal-check display-4 text-success mb-3"></i>
                        <h3 class="counter" data-target="1027">0</h3>
                        <p>Proyek / Site Operasional</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-box">
                        <i class="bi bi-geo-alt display-4 text-warning mb-3"></i>
                        <h3 class="counter" data-target="10">0</h3>
                        <p>Regional Nasional</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-box">
                        <i class="bi bi-people display-4 text-info mb-3"></i>
                        <h3 class="counter" data-target="3573">0</h3>
                        <p>Pekerja Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Stats Counter Section -->

</main>
@endsection

@push('styles')
<style>
    /* Index page specific */
    .index-page .hero {
        position: relative;
        height: 100vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .index-page .hero .info {
        position: relative;
        z-index: 3;
        color: white;
    }

    .index-page .hero h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .index-page .hero p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    /* Carousel styling */
    #hero-carousel {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    #hero-carousel .carousel-item {
        height: 100vh;
        min-height: 600px;
    }

    #hero-carousel .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.7);
    }

    #hero-carousel .carousel-control-prev,
    #hero-carousel .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    #hero-carousel .carousel-control-prev {
        left: 20px;
    }

    #hero-carousel .carousel-control-next {
        right: 20px;
    }

    /* Services cards */
    .card-item {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        margin-bottom: 20px;
    }

    .card-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-bg {
        height: 200px;
        overflow: hidden;
    }

    .card-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .card-item:hover .card-bg img {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    .card-body p {
        color: #666;
        margin-bottom: 15px;
    }

    /* Partner logos */
    .partner-logo {
        max-height: 80px;
        width: auto;
        object-fit: contain;
        padding: 15px;
        filter: grayscale(100%);
        transition: filter 0.3s, transform 0.3s;
    }

    .partner-logo:hover {
        filter: grayscale(0%);
        transform: scale(1.05);
    }

    .portfolio-item {
        margin-bottom: 30px;
    }

    /* Gallery posts */
    .post-item {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .post-item:hover {
        transform: translateY(-5px);
    }

    .post-img {
        height: 200px;
    }

    .post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .post-item:hover .post-img img {
        transform: scale(1.05);
    }

    .post-date {
        position: absolute;
        right: 15px;
        background: rgba(0, 123, 255, 0.9);
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        font-size: 0.9rem;
    }

    .post-content {
        padding: 20px;
    }

    .post-title {
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: #2c3e50;
    }

    .meta {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 15px;
    }

    .readmore {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .readmore:hover {
        color: #0056b3;
    }

    /* Stats boxes */
    .stat-box {
        padding: 30px 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .stat-box:hover {
        transform: translateY(-5px);
    }

    .stat-box i {
        color: #007bff;
    }

    .stat-box h3 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 15px 0;
    }

    .stat-box p {
        color: #666;
        margin: 0;
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
        color: #2c3e50;
    }

    .icon-box p {
        margin: 0;
        color: #666;
    }

    /* CTA section */
    .bg-primary {
        background-color: #007bff !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .index-page .hero {
            height: 80vh;
            min-height: 500px;
        }

        .index-page .hero h2 {
            font-size: 2rem;
        }

        .index-page .hero p {
            font-size: 1rem;
        }

        #hero-carousel .carousel-item {
            height: 80vh;
            min-height: 500px;
        }

        .card-bg {
            height: 150px;
        }

        .post-img {
            height: 150px;
        }

        .stat-box h3 {
            font-size: 2rem;
        }

        .partner-logo {
            max-height: 60px;
            padding: 10px;
        }
    }

    @media (max-width: 576px) {
        .index-page .hero h2 {
            font-size: 1.75rem;
        }

        .index-page .hero p {
            font-size: 0.9rem;
        }

        .card-bg {
            height: 120px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .stat-box {
            padding: 20px 15px;
            margin-bottom: 15px;
        }

        .stat-box h3 {
            font-size: 1.75rem;
        }

        .partner-logo {
            max-height: 50px;
            padding: 5px;
        }
            /* Recent Blog Posts Section - Updated */
    .recent-blog-posts {
        background-color: #f8f9fa;
    }

    .recent-blog-posts .post-item {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid #e9ecef;
    }

    .recent-blog-posts .post-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .recent-blog-posts .post-img {
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .recent-blog-posts .post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .recent-blog-posts .post-item:hover .post-img img {
        transform: scale(1.05);
    }

    .recent-blog-posts .post-date {
        position: absolute;
        right: 15px;
        background: rgba(0, 123, 255, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        font-weight: 500;
        font-size: 0.85rem;
        z-index: 2;
    }

    .recent-blog-posts .post-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .recent-blog-posts .post-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
        line-height: 1.4;
        height: 3em;
        overflow: hidden;
    }

    .recent-blog-posts .meta {
        color: #666;
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .recent-blog-posts .excerpt {
        color: #666;
        line-height: 1.6;
        font-size: 0.9rem;
        margin-bottom: 15px;
        flex-grow: 1;
    }

    .recent-blog-posts .readmore {
        color: #007bff;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
    }

    .recent-blog-posts .readmore:hover {
        color: #0056b3;
    }

    .recent-blog-posts .readmore i {
        transition: transform 0.3s;
        font-size: 0.8rem;
    }

    .recent-blog-posts .readmore:hover i {
        transform: translateX(5px);
    }

    .recent-blog-posts .empty-state {
        padding: 40px 20px;
    }

    .recent-blog-posts .empty-state .display-1 {
        font-size: 3rem;
        color: #dee2e6;
        margin-bottom: 20px;
    }

    .recent-blog-posts .btn-lg {
        padding: 12px 35px;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .recent-blog-posts .btn-lg:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .recent-blog-posts .post-img {
            height: 180px;
        }

        .recent-blog-posts .post-content {
            padding: 15px;
        }

        .recent-blog-posts .post-title {
            font-size: 1rem;
            height: 3.5em;
        }
    }

    @media (max-width: 576px) {
        .recent-blog-posts .post-img {
            height: 160px;
        }

        .recent-blog-posts .post-title {
            height: auto;
            min-height: 3em;
        }

        .recent-blog-posts .empty-state .display-1 {
            font-size: 2.5rem;
        }
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

        // Initialize Isotope for partner logos
        if (typeof Isotope !== 'undefined') {
            const isotopeContainer = document.querySelector('.isotope-container');
            if (isotopeContainer) {
                new Isotope(isotopeContainer, {
                    itemSelector: '.portfolio-item',
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: '.portfolio-item'
                    }
                });
            }
        }

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };

            // Start counter when element is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCount();
                        observer.unobserve(entry.target);
                    }
                });
            });

            observer.observe(counter);
        });

        // Initialize carousel
        const heroCarousel = new bootstrap.Carousel(document.getElementById('hero-carousel'), {
            interval: 5000,
            ride: 'carousel'
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

        // Gallery modal functionality
        const galleryItems = document.querySelectorAll('.post-item .readmore');
        galleryItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const postItem = this.closest('.post-item');
                const imgSrc = postItem.querySelector('img').src;
                const title = postItem.querySelector('.post-title').textContent;
                const date = postItem.querySelector('.post-date').textContent;
                const author = postItem.querySelector('.meta span').textContent;

                // Create modal HTML
                const modalHTML = `
                    <div class="modal fade" id="galleryModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">${title}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="${imgSrc}" class="img-fluid mb-3" alt="${title}">
                                    <p><strong>Tanggal:</strong> ${date}</p>
                                    <p><strong>Penanggung Jawab:</strong> ${author}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Remove existing modal
                const existingModal = document.getElementById('galleryModal');
                if (existingModal) {
                    existingModal.remove();
                }

                // Add modal to body and show it
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
                modal.show();

                        // Recent blog posts interaction
        const blogPosts = document.querySelectorAll('.recent-blog-posts .post-item');
        blogPosts.forEach(post => {
            post.addEventListener('click', function(e) {
                // Cek jika yang diklik bukan link atau button
                if (!e.target.closest('a') && !e.target.closest('button')) {
                    const link = this.querySelector('.readmore');
                    if (link) {
                        link.click();
                    }
                }
            });
        });

        // Hover effect untuk post item
        blogPosts.forEach(post => {
            post.addEventListener('mouseenter', function() {
                this.style.cursor = 'pointer';
            });
            
            post.addEventListener('mouseleave', function() {
                this.style.cursor = 'default';
            });
        });
            });
        });
    });
</script>
@endpush