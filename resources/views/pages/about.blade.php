@extends('layouts.app')

@section('title', 'Tentang Kami - Jayatama')
@section('description', 'Jayatama adalah perusahaan penyedia tenaga kerja dan layanan pendukung operasional yang menjadi bagian dari ekosistem CT Corp.')
@section('keywords', 'Tentang Jayatama, Sejarah, Visi Misi, Profil Perusahaan')
@section('body-class', 'about-page')

@section('content')
<main class="main" style="padding-top: 80px;">
    
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/assets/IMG_0273.JPG') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>Tentang Kami</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/banner/BANNER ABOUT.png') }}" alt="Tentang Jayatama"
                        class="img-fluid rounded">
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="inner-title">Mitra Profesional untuk Solusi Tenaga Kerja</h2>
                    <div class="our-story">
                        <p>
                            Jayatama adalah perusahaan penyedia tenaga kerja dan layanan pendukung operasional
                            yang menjadi bagian dari ekosistem CT Corp. Kami hadir untuk menjawab kebutuhan tenaga kerja
                            profesional, mulai dari security, driver, office boy, cleaning service, hingga teknisi.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Berpengalaman sejak 2012 mengelola ribuan
                                    tenaga kerja di ekosistem CT Corp</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Tenaga kerja terlatih, bersertifikat, dan
                                    profesional</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Didukung sistem informasi manajemen (JIS)
                                    berbasis web & mobile untuk monitoring real-time</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Jaringan operasional nasional dengan 10
                                    regional di seluruh Indonesia</span></li>
                        </ul>
                        <p>
                            Kami percaya bahwa sumber daya manusia adalah aset utama. Karena itu,
                            Jayatama berkomitmen memberikan tenaga kerja yang berkualitas, terpercaya, dan siap
                            mendukung kesuksesan mitra.
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div style="width:70%;">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/8rooLExRr-o" title="Video Profil Jayatama"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Team Section -->
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Top Management</h2>
            <p>Jayatama berkomitmen untuk senantiasa hadir sebagai mitra terpercaya dalam menyediakan tenaga kerja
                profesional
                dan layanan pendukung operasional. Dengan pengalaman lebih dari satu dekade, sistem yang terintegrasi,
                serta
                tenaga kerja yang terlatih dan bersertifikat, kami percaya sumber daya manusia adalah aset utama yang
                akan
                mendorong kesuksesan setiap mitra. Bersama, kita membangun solusi yang berkelanjutan untuk masa depan
                yang lebih baik.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <!-- Direksi -->
            <div class="row gy-5">
                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.png') }}" class="img-fluid"
                            alt="Direktur Utama">
                    </div>
                    <div class="member-info text-center">
                        <h4>Direktur Utama</h4>
                        <span>Pimpinan Perusahaan</span>
                        <p>Menentukan arah strategi bisnis dan menjadi motor penggerak Jayatama.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="150">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIROPS.png') }}" class="img-fluid"
                            alt="Direktur Operasional">
                    </div>
                    <div class="member-info text-center">
                        <h4>Direktur Operasional</h4>
                        <span>Manajemen Layanan</span>
                        <p>Mengelola seluruh aktivitas operasional tenaga kerja dan layanan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Direktur Pembinaan">
                    </div>
                    <div class="member-info text-center">
                        <h4>Direktur Pembinaan</h4>
                        <span>Pembinaan & Pengembangan</span>
                        <p>Bertanggung jawab pada pengembangan kualitas SDM dan pembinaan tenaga kerja.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="250">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Direktur Support">
                    </div>
                    <div class="member-info text-center">
                        <h4>Direktur Support</h4>
                        <span>Dukungan Internal</span>
                        <p>Menyediakan dukungan sistem, administrasi, dan layanan internal perusahaan.</p>
                    </div>
                </div>
            </div><!-- End Direksi -->

            <!-- Staff & Manager -->
            <div class="row gy-5 mt-4">
                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Staff Khusus">
                    </div>
                    <div class="member-info text-center">
                        <h4>Staff Khusus</h4>
                        <span>Tim Pendukung</span>
                        <p>Mendukung langsung direksi dalam pengambilan keputusan strategis.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="350">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Manager OPMD">
                    </div>
                    <div class="member-info text-center">
                        <h4>Manager OPMD</h4>
                        <span>Operasional</span>
                        <p>Koordinator lapangan yang memastikan layanan berjalan sesuai standar.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Manager BSMD">
                    </div>
                    <div class="member-info text-center">
                        <h4>Manager BSMD</h4>
                        <span>Building Support</span>
                        <p>Mengelola layanan support gedung dan fasilitas untuk mendukung operasional klien.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="450">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Manager Finance">
                    </div>
                    <div class="member-info text-center">
                        <h4>Manager Finance</h4>
                        <span>Pengelolaan Keuangan</span>
                        <p>Mengatur transparansi, laporan, dan strategi keuangan perusahaan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Manager HRGS">
                    </div>
                    <div class="member-info text-center">
                        <h4>Manager HRGS</h4>
                        <span>SDM & General Service</span>
                        <p>Mengelola SDM serta layanan umum perusahaan untuk mendukung operasional.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="550">
                    <div class="member-img">
                        <img src="{{ asset('assets/assets/tim kami/DIRUT.jpg') }}" class="img-fluid"
                            alt="Manager Legal">
                    </div>
                    <div class="member-info text-center">
                        <h4>Manager Legal</h4>
                        <span>Bidang Hukum</span>
                        <p>Menangani aspek hukum dan memastikan kepatuhan perusahaan terhadap regulasi.</p>
                    </div>
                </div>
            </div><!-- End Staff & Manager -->
        </div>
    </section><!-- /Team Section -->

    <!-- Alt Services Section -->
    <section id="alt-services" class="alt-services section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/assets/keunggulan_kami/keunggulan_kami.JPG') }}"
                        alt="Keunggulan Jayatama" class="img-fluid rounded">
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up"
                    data-aos-delay="200">
                    <h3>Kenapa Memilih Jayatama?</h3>
                    <p>Jayatama hadir sebagai mitra terpercaya dalam layanan alih daya dengan dukungan tenaga kerja
                        terlatih, sistem terintegrasi, serta jangkauan operasional nasional.</p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Berpengalaman</a></h4>
                            <p>Sejak 2012 dipercaya mengelola ribuan tenaga kerja di ekosistem CT Corp.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Profesional & Bersertifikat</a></h4>
                            <p>Seluruh personel telah terlatih dan memiliki sertifikasi sesuai bidangnya.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-laptop flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Terdepan Teknologi</a></h4>
                            <p>Dukungan <b>JIS (Jayatama Information System)</b> berbasis web & mobile untuk monitoring
                                real-time.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Jaringan Nasional</a></h4>
                            <p>Memiliki 10 regional dengan jangkauan ke seluruh Indonesia.</p>
                        </div>
                    </div><!-- End Icon Box -->
                </div>
            </div>
        </div>
    </section><!-- /Alt Services Section -->

    <!-- Alt Services 2 Section -->
    <section id="alt-services-2" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Layanan Utama Jayatama</h3>
                    <p>Kami menyediakan tenaga kerja profesional untuk mendukung kelancaran operasional perusahaan Anda.
                        Dengan pengalaman panjang, sistem digital terintegrasi, serta tenaga kerja terlatih dan
                        bersertifikat, Jayatama siap menjadi mitra terpercaya dalam layanan alih daya.</p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-check flex-shrink-0"></i>
                            <div>
                                <h4>Security</h4>
                                <p>Tenaga pengamanan profesional, terlatih, dan bersertifikat untuk menjaga keamanan
                                    aset & lingkungan kerja.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-car-front flex-shrink-0"></i>
                            <div>
                                <h4>Driver</h4>
                                <p>Pengemudi berpengalaman dan terlatih untuk mendukung mobilitas operasional
                                    perusahaan.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-house-door flex-shrink-0"></i>
                            <div>
                                <h4>Office Boy</h4>
                                <p>Tenaga kerja pendukung administrasi dan kebersihan kantor, menjaga kelancaran
                                    aktivitas harian.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-brush flex-shrink-0"></i>
                            <div>
                                <h4>Cleaning Service</h4>
                                <p>Petugas kebersihan yang terlatih dengan standar higienitas tinggi untuk lingkungan
                                    kerja yang sehat.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-tools flex-shrink-0"></i>
                            <div>
                                <h4>Teknisi</h4>
                                <p>Tenaga teknis profesional untuk mendukung kebutuhan perawatan & operasional
                                    perusahaan.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/security8.jpg') }}" alt="Layanan Jayatama"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section><!-- /Alt Services 2 Section -->

    <!-- Stats Counter Section -->
    <section id="stats-counter" class="stats-counter section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Statistik Kami</h2>
            <p>Data singkat tentang pencapaian Jayatama</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="46" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Klien Aktif</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="1027" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Proyek / Site Operasional</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-building color-green flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Regional Nasional</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-people color-pink flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="3573" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Pekerja Aktif</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->
            </div>
        </div>
    </section><!-- /Stats Counter Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimoni Klien</h2>
            <p>Berbagai perusahaan dari sektor bank, retail, dan media telah mempercayakan layanan kepada Jayatama.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 2,
                                "spaceBetween": 20
                            }
                        }
                    }
                </script>

                <div class="swiper-wrapper">
                    <!-- Bank Testimonials -->
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/bank-1.jpg') }}" class="testimonial-img"
                                    alt="Bank A">
                                <h3>Bank A</h3>
                                <h4>Manajer Operasional</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Jayatama selalu menghadirkan tenaga kerja yang profesional dan mendukung
                                        keamanan cabang kami.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/bank-2.jpg') }}" class="testimonial-img"
                                    alt="Bank B">
                                <h3>Bank B</h3>
                                <h4>Supervisor Keamanan</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Kami merasa lebih tenang karena sistem pengamanan Jayatama sangat disiplin dan
                                        terlatih.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Retail Testimonials -->
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/retail-1.jpg') }}" class="testimonial-img"
                                    alt="Retail A">
                                <h3>Retail A</h3>
                                <h4>Store Manager</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Jayatama membantu menjaga ketertiban di gerai kami dengan tenaga kerja yang
                                        ramah dan profesional.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/retail-2.jpg') }}" class="testimonial-img"
                                    alt="Retail B">
                                <h3>Retail B</h3>
                                <h4>Regional Manager</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Kami puas dengan kualitas layanan Jayatama. Semua staf bekerja sesuai SOP dan
                                        cepat tanggap.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Media Testimonials -->
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/media-1.jpg') }}" class="testimonial-img"
                                    alt="Media A">
                                <h3>Media A</h3>
                                <h4>Production Manager</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Jayatama selalu responsif dalam mendukung acara dan event besar kami di
                                        lapangan.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('assets/img/testimonials/media-2.jpg') }}" class="testimonial-img"
                                    alt="Media B">
                                <h3>Media B</h3>
                                <h4>News Director</h4>
                                <p><i class="bi bi-quote quote-icon-left"></i>
                                    <span>Dukungan Jayatama menjadikan kegiatan peliputan kami lebih aman dan
                                        kondusif.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- /Testimonials Section -->

    <!-- Values Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title text-center mb-5" data-aos="fade-up">
                <h2>Nilai-Nilai Perusahaan</h2>
                <p>Prinsip yang kami pegang dalam setiap layanan</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-box-lg mb-3">
                                <i class="bi bi-shield-check display-4 text-primary"></i>
                            </div>
                            <h4>Integritas</h4>
                            <p>Menjunjung tinggi kejujuran, transparansi, dan etika profesional dalam setiap aspek
                                bisnis.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-box-lg mb-3">
                                <i class="bi bi-people display-4 text-success"></i>
                            </div>
                            <h4>Profesionalisme</h4>
                            <p>Menyediakan tenaga kerja yang terlatih, bersertifikat, dan berkomitmen pada standar
                                layanan tinggi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-box-lg mb-3">
                                <i class="bi bi-lightbulb display-4 text-warning"></i>
                            </div>
                            <h4>Inovasi</h4>
                            <p>Terus mengembangkan sistem dan teknologi untuk meningkatkan efisiensi dan kualitas
                                layanan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Values Section -->

</main>
@endsection

@push('styles')
<style>
    /* About page specific */
    .about-page .page-title {
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px;
        position: relative;
        color: white;
    }

    .about-page .page-title::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .about-page .page-title .container {
        position: relative;
        z-index: 1;
    }

    .about-page .page-title h1 {
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

    /* About section */
    .about-img {
        margin-bottom: 30px;
    }

    .inner-title {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 2rem;
    }

    .our-story {
        padding: 20px 0;
    }

    .our-story ul {
        list-style: none;
        padding-left: 0;
        margin: 20px 0;
    }

    .our-story ul li {
        margin-bottom: 10px;
        display: flex;
        align-items: flex-start;
    }

    .our-story ul li i {
        color: #28a745;
        margin-right: 10px;
        margin-top: 3px;
    }

    /* Team section */
    .member {
        margin-bottom: 30px;
    }

    .member-img {
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .member-img img {
        transition: transform 0.3s;
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .member-img img:hover {
        transform: scale(1.05);
    }

    .member-info h4 {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .member-info span {
        color: #6c757d;
        font-style: italic;
        margin-bottom: 10px;
        display: block;
    }

    .member-info p {
        color: #666;
        font-size: 0.9rem;
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

    /* Stats counter */
    .stats-item {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .stats-item:hover {
        transform: translateY(-5px);
    }

    .stats-item i {
        font-size: 2.5rem;
        margin-right: 15px;
    }

    .stats-item .purecounter {
        font-size: 2rem;
        font-weight: bold;
        color: #2c3e50;
        display: block;
    }

    .stats-item p {
        margin: 5px 0 0;
        color: #666;
    }

    .color-blue {
        color: #007bff;
    }

    .color-orange {
        color: #fd7e14;
    }

    .color-green {
        color: #28a745;
    }

    .color-pink {
        color: #e83e8c;
    }

    /* Testimonials */
    .testimonial-item {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .testimonial-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .testimonial-item h3 {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .testimonial-item h4 {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 15px;
        font-style: italic;
    }

    .testimonial-item p {
        color: #666;
        font-style: italic;
    }

    .quote-icon-left,
    .quote-icon-right {
        color: #ddd;
        font-size: 1.5rem;
    }

    .quote-icon-left {
        margin-right: 10px;
    }

    .quote-icon-right {
        margin-left: 10px;
    }

    /* Values section */
    .icon-box-lg {
        height: 80px;
        width: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: rgba(0, 123, 255, 0.1);
    }

    /* CTA section */
    .bg-primary {
        background-color: #007bff !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .about-page .page-title {
            padding: 80px 0 40px;
        }

        .about-page .page-title h1 {
            font-size: 2rem;
        }

        .inner-title {
            font-size: 1.75rem;
        }

        .stats-item {
            margin-bottom: 15px;
        }

        .member {
            margin-bottom: 20px;
        }

        .member-img img {
            height: 200px;
        }

        .icon-box {
            margin-bottom: 15px;
        }
    }

    @media (max-width: 576px) {
        .our-story ul li {
            font-size: 0.9rem;
        }

        .testimonial-item {
            padding: 20px;
        }

        .stats-item i {
            font-size: 2rem;
        }

        .stats-item .purecounter {
            font-size: 1.5rem;
        }

        .breadcrumbs ol {
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

        // Initialize Swiper
        const swiperElements = document.querySelectorAll('.init-swiper');
        swiperElements.forEach(element => {
            const config = JSON.parse(element.querySelector('.swiper-config').textContent);
            new Swiper(element, config);
        });

        // Initialize PureCounter
        if (typeof PureCounter !== 'undefined') {
            new PureCounter();
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

    // Video modal
    document.addEventListener('DOMContentLoaded', function() {
        const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
        const videoTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');
        
        videoTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const videoSrc = this.getAttribute('data-video-src');
                const videoIframe = document.querySelector('#videoModal iframe');
                if (videoIframe) {
                    videoIframe.src = videoSrc;
                }
                videoModal.show();
            });
        });

        // Reset video when modal closes
        document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
            const videoIframe = this.querySelector('iframe');
            if (videoIframe) {
                videoIframe.src = '';
            }
        });
    });
</script>
@endpush