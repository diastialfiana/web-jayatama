@extends('layouts.app')

@section('title', 'Kontak - Jayatama')
@section('description', 'Hubungi PT Jasa Swadaya Utama (Jayatama) untuk konsultasi layanan tenaga kerja profesional.')
@section('keywords', 'Kontak Jayatama, Alamat, Telepon, Email, Hubungi Kami')
@section('body-class', 'contact-page')

@section('content')
<main class="main" style="padding-top: 80px;">
    
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>Kontak</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Kontak</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Alamat</h3>
                        <p class="center">Jl. Kapt. P. Tendean Kav 12 No. 14A<br />
                            RT 002 RW 002, Mampang Prapatan<br />
                            Jakarta Selatan, DKI Jakarta
                        </p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Telepon</h3>
                        <p>0812 1285 8685</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>info@jayatama.id</p>
                    </div>
                </div><!-- End Info Item -->
            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <!-- Google Maps -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.200741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sPT%20Jasa%20Swadaya%20Utama%20(PT%20JSU%20-%20Jayatama)!5e0!3m2!1sen!2sid!4v1647858256787!5m2!1sen!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="{{ route('contact.submit') }}" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="400" id="contactForm">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div><!-- End Contact Form -->
            </div>

            <!-- Regional Offices Section -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-4" data-aos="fade-up">
                        <h2>Kantor Regional</h2>
                        <p>Jayatama memiliki jaringan operasional di seluruh Indonesia</p>
                    </div>

                    <div class="row gy-4">
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt-fill display-4 text-primary mb-3"></i>
                                    <h5>Jakarta Pusat</h5>
                                    <p class="small">Jl. Kapt. P. Tendean Kav 12 No. 14A</p>
                                    <p class="small mb-0">Telp: (021) 5795-1234</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt-fill display-4 text-success mb-3"></i>
                                    <h5>Bandung</h5>
                                    <p class="small">Jl. Soekarno Hatta No. 789</p>
                                    <p class="small mb-0">Telp: (022) 756-7890</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt-fill display-4 text-warning mb-3"></i>
                                    <h5>Surabaya</h5>
                                    <p class="small">Jl. Raya Darmo No. 456</p>
                                    <p class="small mb-0">Telp: (031) 567-8901</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt-fill display-4 text-info mb-3"></i>
                                    <h5>Medan</h5>
                                    <p class="small">Jl. Gatot Subroto No. 123</p>
                                    <p class="small mb-0">Telp: (061) 234-5678</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Regional Offices Section -->
        </div>
    </section><!-- /Contact Section -->

</main>
@endsection

@push('styles')
<style>
    /* Contact page specific */
    .contact-page .page-title {
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px;
        position: relative;
        color: white;
    }

    .contact-page .page-title::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .contact-page .page-title .container {
        position: relative;
        z-index: 1;
    }

    .contact-page .page-title h1 {
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

    /* Info Items */
    .info-item {
        background: white;
        padding: 40px 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        height: 100%;
        transition: transform 0.3s;
    }

    .info-item:hover {
        transform: translateY(-5px);
    }

    .info-item i {
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 20px;
    }

    .info-item h3 {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .info-item p {
        color: #666;
        margin: 0;
        text-align: center;
    }

    .info-item .center {
        text-align: center;
    }

    /* Contact Form */
    .php-email-form {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .php-email-form .form-control {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        transition: all 0.3s;
    }

    .php-email-form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .php-email-form textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .php-email-form button[type="submit"] {
        background: #007bff;
        color: white;
        border: none;
        padding: 12px 40px;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s;
    }

    .php-email-form button[type="submit"]:hover {
        background: #0056b3;
    }

    .php-email-form .loading,
    .php-email-form .error-message,
    .php-email-form .sent-message {
        display: none;
        text-align: center;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
        font-weight: 500;
    }

    .php-email-form .loading {
        background: #f8f9fa;
        color: #495057;
    }

    .php-email-form .error-message {
        background: #dc3545;
        color: white;
    }

    .php-email-form .sent-message {
        background: #28a745;
        color: white;
    }

    /* Google Maps */
    iframe {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /* Additional Info Cards */
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    /* Regional Offices */
    .section-title h2 {
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .section-title p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .contact-page .page-title {
            padding: 80px 0 40px;
        }

        .contact-page .page-title h1 {
            font-size: 2rem;
        }

        .info-item {
            padding: 30px 15px;
            margin-bottom: 15px;
        }

        .php-email-form {
            padding: 30px 20px;
        }

        .breadcrumbs ol {
            font-size: 0.9rem;
        }

        .card-body {
            padding: 20px 15px;
        }
    }

    @media (max-width: 576px) {
        .info-item {
            padding: 25px 15px;
        }

        .info-item i {
            font-size: 2rem;
        }

        .info-item h3 {
            font-size: 1.25rem;
        }

        .php-email-form {
            padding: 20px 15px;
        }

        .php-email-form button[type="submit"] {
            padding: 10px 30px;
            font-size: 0.9rem;
        }

        .section-title h2 {
            font-size: 1.75rem;
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

        // Contact form handling
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const form = this;
                const loading = form.querySelector('.loading');
                const errorMessage = form.querySelector('.error-message');
                const sentMessage = form.querySelector('.sent-message');
                
                // Show loading
                loading.style.display = 'block';
                errorMessage.style.display = 'none';
                sentMessage.style.display = 'none';
                
                // Simulate form submission
                setTimeout(() => {
                    // Hide loading
                    loading.style.display = 'none';
                    
                    // Show success message
                    sentMessage.style.display = 'block';
                    
                    // Reset form after 3 seconds
                    setTimeout(() => {
                        form.reset();
                        sentMessage.style.display = 'none';
                    }, 3000);
                }, 1500);
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
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Phone number formatting
        const phoneInputs = document.querySelectorAll('input[name="phone"]');
        phoneInputs.forEach(input => {
            input.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 3 && value.length <= 7) {
                    value = value.replace(/(\d{3})(\d+)/, '$1-$2');
                } else if (value.length > 7 && value.length <= 11) {
                    value = value.replace(/(\d{3})(\d{4})(\d+)/, '$1-$2-$3');
                } else if (value.length > 11) {
                    value = value.replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
                }
                this.value = value;
            });
        });
    });

    // Real form submission with AJAX
    async function submitContactForm(form) {
        const formData = new FormData(form);
        
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (response.ok) {
                return { success: true, message: data.message || 'Pesan berhasil dikirim!' };
            } else {
                return { success: false, message: data.message || 'Terjadi kesalahan. Silakan coba lagi.' };
            }
        } catch (error) {
            return { success: false, message: 'Koneksi internet bermasalah. Silakan coba lagi.' };
        }
    }
</script>
@endpush