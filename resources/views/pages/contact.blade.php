@extends('layouts.app')

@section('title', 'Kontak & Pengaduan - Jayatama')
@section('description', 'Hubungi PT Jasa Swadaya Utama (Jayatama) untuk konsultasi layanan tenaga kerja profesional atau kirim pengaduan.')
@section('keywords', 'Kontak Jayatama, Pengaduan, Alamat, Telepon, Email, Hubungi Kami')
@section('body-class', 'contact-page')

@section('content')
<main class="main" style="padding-top: 80px;">
    
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>Kontak & Pengaduan</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Kontak & Pengaduan</li>
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
                        <p class="center">Jl. Raya Bantar Jati Komp. Primkopti Blok C6 No.10<br />
                           Keluarahan Setu, Kecamatan Cipayung<br />
                            Jakarta Timur, DKI Jakarta
                        </p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Telepon</h3>
                        <p>0823-1111-3735</p>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.94624484775!2d106.917902!3d-6.3105931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992b1321df46d%3A0xcf24ea93ebc6dd27!2sPT.%20Jasa%20Swadaya%20Utama!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <!-- Form Pengaduan Card -->
                    <div class="card border-0 shadow-sm mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header bg-primary text-white py-3">
                            <h4 class="mb-0 text-white"><i class="bi bi-megaphone me-2"></i>Form Pengaduan</h4>
                            <p class="mb-0 small">Sampaikan keluhan, saran, atau pertanyaan Anda</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('complaint.submit') }}" method="post" class="php-email-form" id="complaintForm">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" 
                                                   placeholder="Masukkan nama lengkap" required>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   placeholder="email@contoh.com" required>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Telepon/WhatsApp</label>
                                            <input type="text" class="form-control" id="phone" name="phone" 
                                                   placeholder="0812-3456-7890">
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" class="form-label">Jenis Pengaduan <span class="text-danger">*</span></label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="">-- Pilih Jenis --</option>
                                                <option value="complaint">Keluhan / Masalah</option>
                                                <option value="suggestion">Saran / Usulan</option>
                                                <option value="question">Pertanyaan</option>
                                            </select>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="subject" class="form-label">Judul Pengaduan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject" name="subject" 
                                                   placeholder="Ringkasan singkat pengaduan Anda" required>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message" class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="message" name="message" rows="5" 
                                                      placeholder="Jelaskan pengaduan Anda secara detail..." required></textarea>
                                            <small class="text-muted">Silakan jelaskan dengan jelas untuk memudahkan penanganan.</small>
                                            <div class="character-counter text-muted small mt-1 text-end">
                                                <span id="charCount">0</span>/2000 karakter
                                            </div>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                Saya setuju dengan <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#termsModal">syarat dan ketentuan</a> pengaduan
                                            </label>
                                            <div class="field-error text-danger small mt-1" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="loading alert" style="display: none;">                            
                                        <div class="success-message alert alert-success" style="display: none;">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                                                <div>
                                                    <strong>Pengaduan berhasil dikirim!</strong><br>
                                                    <small class="text-muted">Tim kami akan menghubungi Anda maksimal 3x24 jam.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-12 text-center pt-3">
                                        <button type="submit" class="btn btn-primary btn-lg px-5">
                                            <i class="bi bi-send me-2"></i>Kirim Pengaduan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Form Pengaduan Card -->
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
                                    <h5>Jakarta Selatan</h5>
                                    <p class="small">Jl. Kapt. P. Tendean Kav 12 No. 14A</p>
                                    <p class="small mb-0">Email: info@jayatama.id</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-geo-alt-fill display-4 text-success mb-3"></i>
                                    <h5>Jakarta Timur</h5>
                                    <p class="small">Jl. Raya Bantar Jati Komp. Primkopti Blok C6 No.10</p>
                                    <p class="small mb-0">Email: info@jayatama.id</p>
                                </div>
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

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white">Syarat dan Ketentuan Pengaduan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6>1. Ketentuan Umum:</h6>
                <ul>
                    <li>Pengaduan akan diproses maksimal 3x24 jam kerja</li>
                    <li>Harap memberikan informasi yang jelas, benar, dan lengkap</li>
                    <li>Data pribadi Anda akan dijaga kerahasiaannya</li>
                    <li>Pengaduan akan ditindaklanjuti sesuai dengan prosedur yang berlaku</li>
                </ul>
                
                <h6>2. Proses Penanganan:</h6>
                <ul>
                    <li>Setelah pengaduan dikirim, Anda akan mendapat nomor tiket</li>
                    <li>Gunakan nomor tiket untuk mengecek status pengaduan</li>
                    <li>Tim kami akan menghubungi Anda melalui email atau telepon</li>
                    <li>Lama penanganan tergantung kompleksitas masalah</li>
                </ul>
                
                <h6>3. Informasi Penting:</h6>
                <p>Simpan nomor tiket pengaduan untuk keperluan tracking status. Pastikan email dan nomor telepon yang Anda berikan aktif.</p>
                
                <div class="alert alert-info mt-3">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>Catatan:</strong> Pengaduan palsu atau mengandung unsur fitnah akan diproses sesuai hukum yang berlaku.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Saya Mengerti</button>
            </div>
        </div>
    </div>
</div>
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

    /* Form Pengaduan Styles */
    .card .card-header.bg-primary {
        border-radius: 8px 8px 0 0 !important;
    }
    
    .php-email-form {
        background: white;
        padding: 0;
        border-radius: 0;
        box-shadow: none;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .form-control, .form-select {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 5px;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .form-control::placeholder {
        color: #6c757d;
        opacity: 0.7;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .field-error {
        font-size: 0.875rem;
    }
    
    /* Loading animation */
    .loading .spinner-border {
        width: 1rem;
        height: 1rem;
    }
    
    /* Alert messages */
    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1rem;
    }
    
    .alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border-left: 4px solid #198754;
    }
    
    .alert-info {
        background-color: #cff4fc;
        color: #055160;
        border-left: 4px solid #0dcaf0;
    }
    
    /* Button styles */
    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        border: none;
        padding: 12px 40px;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }
    
    .btn-lg {
        padding: 12px 40px;
        font-size: 1.1rem;
    }
    
    /* Character counter */
    .character-counter {
        margin-top: 0.25rem;
    }
    
    #charCount {
        font-weight: bold;
    }
    
    #charCount.text-success {
        color: #198754 !important;
    }
    
    #charCount.text-warning {
        color: #ffc107 !important;
    }
    
    #charCount.text-danger {
        color: #dc3545 !important;
    }
    
    /* Terms checkbox */
    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .form-check-input:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    /* Modal styles */
    .modal-content {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .modal-header.bg-primary {
        padding: 1.25rem 1.5rem;
    }
    
    .btn-close-white {
        filter: invert(1) grayscale(100%) brightness(200%);
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

        .card-body {
            padding: 20px;
        }
        
        .btn-lg {
            padding: 10px 30px;
            font-size: 1rem;
        }
        
        .breadcrumbs ol {
            font-size: 0.9rem;
        }

        .card-body {
            padding: 20px 15px;
        }
        
        .modal-body {
            padding: 1rem;
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

        .card-body {
            padding: 15px;
        }

        .btn-primary {
            padding: 10px 30px;
            font-size: 0.9rem;
        }

        .section-title h2 {
            font-size: 1.75rem;
        }
        
        .php-email-form .col-md-6 {
            margin-bottom: 0;
        }
    }
    
    @media (max-width: 400px) {
        .btn-lg {
            width: 100%;
            padding: 12px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // AOS initialization
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }

        // Complaint form handling dengan delay untuk testing
const complaintForm = document.getElementById('complaintForm');
if (complaintForm) {
    complaintForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const form = this;
        const loading = form.querySelector('.loading');
        const successMessage = form.querySelector('.success-message');
        const submitButton = form.querySelector('button[type="submit"]');
        
        // Validasi
        let isValid = true;
        form.querySelectorAll('[required]').forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            }
        });
        
        if (!form.querySelector('#terms').checked) {
            isValid = false;
            form.querySelector('#terms').classList.add('is-invalid');
            alert('Setujui syarat & ketentuan');
            return;
        }
        
        if (!isValid) {
            alert('Lengkapi semua field wajib');
            return;
        }
        
        // Tampilkan loading
        loading.style.display = 'block';
        successMessage.style.display = 'none';
        submitButton.disabled = true;
        
        // Simulasi delay 2 detik untuk testing
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        try {
            // Kirim form
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            });
            
            const data = await response.json();
            
            // HIDE LOADING - INI YANG PENTING!
            loading.style.display = 'none';
            submitButton.disabled = false;
            
            if (data.success) {
                // Tampilkan sukses
                successMessage.style.display = 'block';
                successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Reset form
                form.reset();
                form.querySelector('#terms').checked = false;
                
                // Reset counter
                const counter = document.getElementById('charCount');
                if (counter) counter.textContent = '0';
                
                // Auto hide
                setTimeout(() => successMessage.style.display = 'none', 10000);
                
            } else {
                alert('Error: ' + (data.message || 'Unknown'));
            }
            
        } catch (error) {
            console.error('Error:', error);
            // HIDE LOADING MESKIPUN ERROR!
            loading.style.display = 'none';
            submitButton.disabled = false;
            alert('Network error');
        }
    });
}
        // Character counter untuk message field
        const messageField = document.getElementById('message');
        if (messageField) {
            messageField.addEventListener('input', function() {
                const charCount = document.getElementById('charCount');
                const currentLength = this.value.length;
                charCount.textContent = currentLength;
                
                // Ubah warna jika mendekati limit
                if (currentLength > 1800) {
                    charCount.className = 'text-warning';
                } else if (currentLength > 1900) {
                    charCount.className = 'text-danger';
                } else if (currentLength > 0) {
                    charCount.className = 'text-success';
                } else {
                    charCount.className = '';
                }
            });
        }

        // Format nomor telepon
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 0) {
                    // Format: 0812-3456-7890
                    if (value.length <= 4) {
                        value = value;
                    } else if (value.length <= 8) {
                        value = value.replace(/(\d{4})(\d+)/, '$1-$2');
                    } else {
                        value = value.replace(/(\d{4})(\d{4})(\d+)/, '$1-$2-$3');
                    }
                }
                this.value = value.substring(0, 14);
            });
        }

        // Validasi real-time
        const validateField = (field) => {
            const value = field.value.trim();
            const errorElement = field.closest('.form-group')?.querySelector('.field-error');
            
            if (!errorElement) return true;
            
            if (field.hasAttribute('required') && !value) {
                errorElement.textContent = 'Field ini wajib diisi';
                errorElement.style.display = 'block';
                field.classList.add('is-invalid');
                return false;
            }
            
            if (field.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    errorElement.textContent = 'Format email tidak valid';
                    errorElement.style.display = 'block';
                    field.classList.add('is-invalid');
                    return false;
                }
            }
            
            errorElement.style.display = 'none';
            field.classList.remove('is-invalid');
            return true;
        };

        // Tambahkan listener validasi
        const formFields = document.querySelectorAll('#complaintForm input, #complaintForm textarea, #complaintForm select');
        formFields.forEach(field => {
            field.addEventListener('blur', () => validateField(field));
            field.addEventListener('input', () => {
                const errorElement = field.closest('.form-group')?.querySelector('.field-error');
                if (errorElement) {
                    errorElement.style.display = 'none';
                    field.classList.remove('is-invalid');
                }
            });
        });

        // Smooth scrolling untuk link anchor
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
    });

    // Bootstrap tooltip initialization
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush