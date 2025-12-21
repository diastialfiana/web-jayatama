@extends('layouts.app')

@section('title', 'Layanan - Jayatama')
@section('description', 'Jayatama menyediakan berbagai layanan tenaga kerja profesional termasuk Security, Office Service, Driver, Messenger, Teknisi, F&B, Parking, dan Gondola.')
@section('keywords', 'Layanan Jayatama, Security, Office Service, Driver, Messenger, Teknisi, Food & Beverage, Parking, Gondola')
@section('body-class', 'services-page')

@section('content')
<main class="main" style="padding-top: 80px;">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/assets/keunggulan_kami/keunggulan_kami.JPG') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>Layanan</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Layanan</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Services Overview Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title text-center mb-5" data-aos="fade-up">
                <h2>Layanan Profesional Jayatama</h2>
                <p>Kami menyediakan tenaga kerja profesional untuk mendukung kelancaran operasional perusahaan Anda</p>
            </div>

            <div class="row gy-4">
                @php
                $services = [
                    [
                        'id' => 'security',
                        'title' => 'Security',
                        'icon' => 'bi-shield-check',
                        'color' => 'primary',
                        'description' => 'Tenaga pengamanan profesional dengan sertifikasi resmi untuk menjaga keamanan aset perusahaan'
                    ],
                    [
                        'id' => 'office-service',
                        'title' => 'Office Service',
                        'icon' => 'bi-briefcase',
                        'color' => 'success',
                        'description' => 'Layanan kebersihan dan dukungan operasional kantor untuk lingkungan kerja yang optimal'
                    ],
                    [
                        'id' => 'driver',
                        'title' => 'Driver',
                        'icon' => 'bi-car-front',
                        'color' => 'warning',
                        'description' => 'Pengemudi profesional untuk mendukung mobilitas operasional perusahaan'
                    ],
                    [
                        'id' => 'messenger',
                        'title' => 'Messenger',
                        'icon' => 'bi-envelope-paper',
                        'color' => 'info',
                        'description' => 'Layanan pengiriman dokumen dan barang dengan cepat dan aman'
                    ],
                    [
                        'id' => 'teknisi',
                        'title' => 'Teknisi',
                        'icon' => 'bi-tools',
                        'color' => 'danger',
                        'description' => 'Tenaga teknis profesional untuk perawatan dan perbaikan fasilitas'
                    ],
                    [
                        'id' => 'fnb',
                        'title' => 'Food & Beverage',
                        'icon' => 'bi-cup-straw',
                        'color' => 'primary',
                        'description' => 'Layanan makanan dan minuman untuk mendukung operasional hospitality'
                    ],
                    [
                        'id' => 'parking',
                        'title' => 'JP Parking',
                        'icon' => 'bi-p-circle',
                        'color' => 'success',
                        'description' => 'Pengelolaan parkir profesional untuk ketertiban dan keamanan area parkir'
                    ],
                    [
                        'id' => 'gondola',
                        'title' => 'Gondola',
                        'icon' => 'bi-gem',
                        'color' => 'warning',
                        'description' => 'Layanan pembersihan gedung tinggi dengan teknologi gondola modern'
                    ]
                ];
                @endphp

                @foreach($services as $service)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <a href="#{{ $service['id'] }}" class="service-card-link text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 service-overview-card">
                            <div class="card-body text-center p-4">
                                <div class="service-icon mb-3">
                                    <i class="bi {{ $service['icon'] }} display-4 text-{{ $service['color'] }}"></i>
                                </div>
                                <h4 class="card-title">{{ $service['title'] }}</h4>
                                <p class="card-text small">{{ $service['description'] }}</p>
                                <div class="mt-3">
                                    <span class="badge bg-{{ $service['color'] }}">Detail</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Services Overview Section -->

    <!-- Security Service Section -->
    <section id="security" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Security</h3>
                    <p>
                        Jayatama menyediakan tenaga pengamanan profesional, terlatih, dan bersertifikat untuk menjaga
                        keamanan aset, lingkungan kerja, serta mendukung kelancaran operasional perusahaan. Dengan standar
                        pelatihan resmi dan pengalaman yang luas, tim security kami siap memberikan layanan pengamanan
                        terbaik di berbagai sektor.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-lock flex-shrink-0"></i>
                            <div>
                                <h4>Profesional & Bersertifikat</h4>
                                <p>Seluruh personel security memiliki pelatihan resmi dan sertifikasi (Gada
                                    Pratama/Madya).</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-building flex-shrink-0"></i>
                            <div>
                                <h4>Berbagai Sektor</h4>
                                <p>Dipercaya menjaga perbankan, retail, media, gedung perkantoran, hingga event
                                    berskala besar.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-people flex-shrink-0"></i>
                            <div>
                                <h4>Dukungan Tim Solid</h4>
                                <p>Personel pengamanan bekerja dengan disiplin tinggi dan koordinasi yang terintegrasi.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-clock-history flex-shrink-0"></i>
                            <div>
                                <h4>Siaga 24/7</h4>
                                <p>Memberikan perlindungan dan rasa aman setiap saat, kapan pun dan di mana pun
                                    dibutuhkan.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.security') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>

                <div class="features-image col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-03 at 14.23.50 (3).jpeg') }}"
                        alt="Security Jayatama" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- /Security Service Section -->

    <!-- Office Service Section -->
    <section id="office-service" class="alt-services-2 section bg-light">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-01 at 16.06.40.jpeg') }}"
                        alt="Office Service Jayatama" class="img-fluid rounded">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Office Service</h3>
                    <p>
                        Layanan <b>Office Service</b> Jayatama berfokus pada tenaga kebersihan dan perawatan area kantor
                        untuk menjaga lingkungan kerja yang nyaman, bersih, dan rapi. Dengan personel yang terlatih dan
                        disiplin, kami memastikan kebutuhan kebersihan kantor terpenuhi sesuai standar profesional.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-bucket flex-shrink-0"></i>
                            <div>
                                <h4>Kebersihan Ruang Kerja</h4>
                                <p>Menjaga ruang kerja tetap bersih dan tertata agar produktivitas karyawan meningkat.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-building flex-shrink-0"></i>
                            <div>
                                <h4>Perawatan Kantor</h4>
                                <p>Membantu perawatan area kantor, pantry, serta fasilitas kerja sehari-hari.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-check-circle flex-shrink-0"></i>
                            <div>
                                <h4>Disiplin & Terlatih</h4>
                                <p>Seluruh personel dilatih sesuai SOP kebersihan dan standar pelayanan profesional.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-person-check flex-shrink-0"></i>
                            <div>
                                <h4>Ramah & Responsif</h4>
                                <p>Memberikan layanan dengan sikap ramah dan cepat tanggap terhadap kebutuhan kantor.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.os') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Office Service Section -->

    <!-- Teknisi Section -->
    <section id="teknisi" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Teknisi / Mechanical Engineering</h3>
                    <p>
                        Jayatama menyediakan tenaga <b>Teknisi / Mechanical Engineering (ME)</b> profesional untuk
                        mendukung perawatan dan operasional fasilitas gedung. Dengan pengalaman serta pelatihan khusus,
                        teknisi kami siap menangani kebutuhan mechanical, electrical, hingga perbaikan umum dengan standar
                        layanan terbaik.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-lightning-charge flex-shrink-0"></i>
                            <div>
                                <h4>Electrical</h4>
                                <p>Menangani instalasi & perawatan listrik, panel, genset, serta troubleshooting
                                    kelistrikan.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-gear-wide-connected flex-shrink-0"></i>
                            <div>
                                <h4>Mechanical</h4>
                                <p>Perawatan AC, pompa air, lift, eskalator, serta peralatan mekanik lainnya.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-tools flex-shrink-0"></i>
                            <div>
                                <h4>Perawatan Rutin</h4>
                                <p>Melakukan inspeksi & perawatan berkala agar fasilitas tetap berfungsi optimal.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-check2-circle flex-shrink-0"></i>
                            <div>
                                <h4>Teknisi Bersertifikat</h4>
                                <p>Seluruh teknisi kami telah melalui pelatihan khusus dan memiliki sertifikasi sesuai
                                    bidangnya.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.teknisi') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>

                <div class="features-image col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/Galeri/WhatsApp Image 2025-09-09 at 15.47.45.jpeg') }}"
                        alt="Teknisi Jayatama" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- /Teknisi Section -->

    <!-- Gondola Section -->
    <section id="gondola" class="alt-services-2 section bg-light">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/project/WhatsApp Image 2025-09-01 at 16.06.36.jpeg') }}"
                        alt="Gondola Man Jayatama" class="img-fluid rounded">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Gondola Man</h3>
                    <p>
                        Jayatama menyediakan tenaga <b>Gondola Man</b> profesional untuk layanan pembersihan gedung
                        bertingkat tinggi. Dengan keterampilan khusus dan standar keselamatan kerja yang ketat, personel
                        kami mampu menjaga kebersihan eksterior gedung menggunakan peralatan gondola modern.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-building flex-shrink-0"></i>
                            <div>
                                <h4>High Rise Cleaning</h4>
                                <p>Spesialis pembersihan kaca luar dan eksterior gedung bertingkat tinggi.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-check flex-shrink-0"></i>
                            <div>
                                <h4>Keselamatan Kerja</h4>
                                <p>Personel dilengkapi APD lengkap serta mengikuti prosedur K3 dengan ketat.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-award flex-shrink-0"></i>
                            <div>
                                <h4>Tersertifikasi</h4>
                                <p>Semua gondolaman kami telah menjalani pelatihan khusus dan memiliki sertifikasi resmi.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-tools flex-shrink-0"></i>
                            <div>
                                <h4>Peralatan Modern</h4>
                                <p>Menggunakan gondola dan perlengkapan standar industri untuk hasil pembersihan optimal.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.gondola') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Gondola Section -->

    <!-- Messenger Section -->
    <section id="messenger" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Messenger</h3>
                    <p>
                        Jayatama menyediakan tenaga <b>Messenger</b> profesional yang mendukung kelancaran operasional
                        perusahaan melalui layanan pengiriman dokumen dan barang. Personel kami terlatih untuk bekerja
                        cepat, aman, serta menjaga kerahasiaan dokumen penting klien.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-envelope-paper flex-shrink-0"></i>
                            <div>
                                <h4>Pengiriman Dokumen</h4>
                                <p>Menangani distribusi dokumen penting dengan aman dan tepat waktu.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-lock flex-shrink-0"></i>
                            <div>
                                <h4>Aman & Rahasia</h4>
                                <p>Menjamin kerahasiaan dan keamanan dokumen selama proses pengiriman.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-clock-history flex-shrink-0"></i>
                            <div>
                                <h4>Tepat Waktu</h4>
                                <p>Personel disiplin dan bertanggung jawab untuk memastikan dokumen sampai sesuai jadwal.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-person-check flex-shrink-0"></i>
                            <div>
                                <h4>Profesional</h4>
                                <p>Messenger Jayatama bekerja dengan sopan, ramah, dan sesuai standar pelayanan
                                    perusahaan.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.messenger') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>

                <div class="features-image col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/messenger1.jpg') }}" alt="Messenger Jayatama" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- /Messenger Section -->

    <!-- Driver Section -->
    <section id="driver" class="alt-services-2 section bg-light">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/driver1.jpg') }}" alt="Driver Jayatama" class="img-fluid rounded">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Driver</h3>
                    <p>
                        Jayatama menyediakan tenaga <b>Driver</b> profesional untuk mendukung mobilitas perusahaan maupun
                        eksekutif. Dengan pengalaman serta pelatihan khusus, para driver kami siap memberikan layanan
                        berkendara yang aman, nyaman, dan terpercaya.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-car-front flex-shrink-0"></i>
                            <div>
                                <h4>Profesional & Berpengalaman</h4>
                                <p>Driver terlatih dalam mengemudi dengan aman, sopan, dan penuh tanggung jawab.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-check flex-shrink-0"></i>
                            <div>
                                <h4>Safety Driving</h4>
                                <p>Menerapkan standar keselamatan berkendara untuk menjaga keamanan penumpang dan
                                    kendaraan.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-briefcase flex-shrink-0"></i>
                            <div>
                                <h4>Dukungan Operasional</h4>
                                <p>Siap menunjang mobilitas operasional harian perusahaan di berbagai sektor industri.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-person-badge flex-shrink-0"></i>
                            <div>
                                <h4>Keamanan & Kerahasiaan</h4>
                                <p>Driver bekerja dengan menjaga kerahasiaan informasi dan kenyamanan klien.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.driver') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Driver Section -->

    <!-- Parking Section -->
    <section id="parking" class="alt-services-2 section">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>JP Parking</h3>
                    <p>
                        Jayatama melalui <b>JP Parking</b> menyediakan layanan pengelolaan parkir yang profesional dan
                        terorganisir. Dengan petugas yang ramah, disiplin, serta terlatih, kami memastikan area parkir tetap
                        tertib, aman, dan mendukung kenyamanan pengunjung maupun operasional perusahaan.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-cone-striped flex-shrink-0"></i>
                            <div>
                                <h4>Tertib & Aman</h4>
                                <p>Petugas menjaga kelancaran arus kendaraan dan keamanan area parkir.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-person-badge flex-shrink-0"></i>
                            <div>
                                <h4>Petugas Profesional</h4>
                                <p>Tim parkir yang disiplin, sigap, dan memberikan pelayanan ramah kepada pengguna.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-building flex-shrink-0"></i>
                            <div>
                                <h4>Dukungan Gedung & Area Publik</h4>
                                <p>Mengelola parkir di perkantoran, pusat perbelanjaan, dan area publik lainnya.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-gear flex-shrink-0"></i>
                            <div>
                                <h4>Sistematis & Efisien</h4>
                                <p>Penerapan sistem manajemen parkir yang terstruktur untuk hasil maksimal.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.parking') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>

                <div class="features-image col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/layanan kami/parking2.jpg') }}" alt="JP Parking Jayatama"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <!-- /Parking Section -->

    <!-- Food & Beverage Section -->
    <section id="fnb" class="alt-services-2 section bg-light">
        <div class="container">
            <div class="row justify-content-around gy-4">
                <div class="features-image col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/assets/layanan kami/fnb2.jpg') }}" alt="Food & Beverage Jayatama"
                        class="img-fluid rounded">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Food & Beverage Service</h3>
                    <p>
                        Jayatama menyediakan tenaga kerja <b>Food & Beverage (F&B)</b> yang profesional untuk mendukung
                        operasional hotel, restoran, hingga event. Dengan pelatihan khusus, personel F&B kami siap
                        memberikan pelayanan prima, ramah, serta menjaga standar higienitas sesuai kebutuhan industri
                        hospitality.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-cup-hot flex-shrink-0"></i>
                            <div>
                                <h4>Waiter & Waitress</h4>
                                <p>Melayani tamu dengan ramah, cepat, dan menjaga standar pelayanan.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-cup-straw flex-shrink-0"></i>
                            <div>
                                <h4>Barista & Bartender</h4>
                                <p>Tenaga terlatih dalam menyajikan minuman sesuai standar hospitality.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-egg-fried flex-shrink-0"></i>
                            <div>
                                <h4>Kitchen Helper</h4>
                                <p>Mendukung tim dapur dalam menjaga kebersihan, persiapan, dan kelancaran operasional.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-shield-check flex-shrink-0"></i>
                            <div>
                                <h4>Higienis & Profesional</h4>
                                <p>Menjaga standar higienitas tinggi dalam setiap layanan F&B untuk kenyamanan tamu.</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('layanan.fnb') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Food & Beverage Section -->
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

    /* Service overview cards */
    .service-overview-card {
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }

    .service-overview-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .service-card-link:hover {
        text-decoration: none;
    }

    .service-icon {
        height: 80px;
        width: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: rgba(0, 123, 255, 0.1);
    }

    .service-overview-card .card-title {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .service-overview-card .card-text {
        color: #666;
        min-height: 60px;
    }

    /* Alt services sections */
    .alt-services-2 {
        padding: 80px 0;
    }

    .alt-services-2 h3 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 2rem;
    }

    .alt-services-2 p {
        color: #666;
        margin-bottom: 30px;
        font-size: 1.1rem;
        line-height: 1.8;
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
        font-size: 0.95rem;
    }

    /* Features image */
    .features-image {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .features-image img {
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .features-image img:hover {
        transform: scale(1.02);
    }

    /* Section backgrounds */
    .bg-light {
        background-color: #f8f9fa !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .services-page .page-title {
            padding: 80px 0 40px;
        }

        .services-page .page-title h1 {
            font-size: 2rem;
        }

        .alt-services-2 {
            padding: 60px 0;
        }

        .alt-services-2 h3 {
            font-size: 1.75rem;
        }

        .service-overview-card {
            margin-bottom: 20px;
        }

        .service-icon {
            height: 60px;
            width: 60px;
        }

        .service-icon i {
            font-size: 2rem;
        }

        .features-image {
            margin-bottom: 30px;
        }

        .breadcrumbs ol {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .services-page .page-title {
            padding: 60px 0 30px;
        }

        .services-page .page-title h1 {
            font-size: 1.75rem;
        }

        .alt-services-2 h3 {
            font-size: 1.5rem;
        }

        .icon-box {
            margin-bottom: 15px;
        }

        .icon-box i {
            font-size: 20px;
        }

        .icon-box h4 {
            font-size: 16px;
        }

        .service-overview-card .card-text {
            min-height: 80px;
        }

        .breadcrumbs ol {
            font-size: 0.8rem;
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

    // Add active class to service cards on scroll
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    // Observe service sections
    document.querySelectorAll('.alt-services-2').forEach(section => {
        observer.observe(section);
    });
});
</script>
@endpush