@extends('layouts.app')

@section('title', 'Admin Login - Jayatama')
@section('body-class', 'admin-login-page')

@section('content')
<main style="padding-top: 80px;">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-height: 90vh; overflow-y: auto; margin-top: -25px;">
                <!-- Header dengan logo -->
                <div class="card-header bg-gradient-primary text-white text-center py-3 px-4">
                    <div class="mb-2">
                        <div class="login-logo mx-auto mb-2">
                            <i class="bi bi-shield-lock-fill fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-0">Jayatama CMS</h4>
                        <small class="opacity-75">Content Management System</small>
                    </div>
                </div>

                <div class="card-body p-2">
                    <!-- Welcome Message -->
                    <div class="text-center mb-1">
                        <h6 class="fw-semibold text-dark mb-0">Selamat Datang</h6>
                        <p class="text-muted mb-1" style="font-size: 0.7rem;">Masuk untuk mengelola konten</p>
                    </div>

                    <!-- Alerts -->
                    @if(session('error'))
                        <div class="alert alert-danger py-1 px-2 mb-1" style="font-size: 0.7rem;">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i>{{ session('error') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        
                        <div class="mb-1">
                            <label class="form-label mb-0" style="font-size: 0.75rem;">Username</label>
                            <input type="text" class="form-control form-control-sm" name="username" placeholder="admin" required>
                        </div>
                        
                        <div class="mb-1">
                            <label class="form-label mb-0" style="font-size: 0.75rem;">Password</label>
                            <div class="input-group input-group-sm">
                                <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <small class="text-muted" style="font-size: 0.65rem;">
                                Default: admin / admin123
                            </small>
                        </div>
                        
                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary btn-sm py-1">Masuk</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-2">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">Kembali ke Beranda</a>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer text-center py-2 bg-light">
                    <small class="text-muted">
                        &copy; {{ date('Y') }} Jayatama • v1.0.0
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .admin-login-page {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    .admin-login-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.03" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        background-position: center;
        opacity: 0.1;
    }

    /* Card Styling - Lebih Compact */
    .card {
        border: none;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.98);
        max-width: 400px;
        margin: 0 auto;
    }

    .card-header {
        padding: 0.75rem 1rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);
    }

    .login-logo {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    /* Form Elements */
    .form-control {
        border-color: #dee2e6;
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem;
        height: auto;
    }

    .form-control:focus {
        border-color: #0062E6;
        box-shadow: 0 0 0 0.2rem rgba(0, 98, 230, 0.15);
    }

    .input-group {
        border-radius: 0.375rem;
    }

    .input-group-text {
        padding: 0.5rem 0.75rem;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .input-group .btn-outline-secondary {
        padding: 0.5rem 0.75rem;
        border-color: #dee2e6;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);
        border: none;
        font-size: 0.9rem;
        padding: 0.625rem 1rem;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 98, 230, 0.3);
    }

    .btn-outline-secondary {
        font-size: 0.85rem;
        padding: 0.375rem 1rem;
        transition: all 0.2s;
    }

    .btn-outline-secondary:hover {
        transform: translateY(-1px);
    }

    /* Alerts */
    .alert {
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
        border: none;
        border-left: 3px solid;
    }

    .alert-danger {
        border-left-color: #dc3545;
        background: linear-gradient(135deg, #fff 0%, #ffe6e6 100%);
    }

    .alert-success {
        border-left-color: #198754;
        background: linear-gradient(135deg, #fff 0%, #e6ffe6 100%);
    }

    .alert-warning {
        border-left-color: #ffc107;
        background: linear-gradient(135deg, #fff 0%, #fff9e6 100%);
    }

    .btn-close-sm {
        padding: 0.5rem;
        background-size: 0.75rem;
    }

    /* Form Labels and Text */
    .form-label {
        font-size: 0.875rem;
    }

    .form-text {
        font-size: 0.8rem;
    }

    code {
        font-size: 0.8rem;
        padding: 0.125rem 0.375rem;
        background: #f8f9fa;
        border-radius: 3px;
        font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
    }

    /* Scrollbar Styling */
    .card::-webkit-scrollbar {
        width: 6px;
    }

    .card::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .card::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }

    .card::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }
        
        .card {
            margin: 0.5rem;
            max-height: 85vh;
        }
        
        .card-body {
            padding: 1.25rem;
        }
        
        .login-logo {
            width: 45px;
            height: 45px;
        }
        
        h4 {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .admin-login-page {
            padding: 0;
        }
        
        .card {
            border-radius: 0.75rem;
            margin: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-body {
            padding: 1rem;
        }
        
        .btn {
            font-size: 0.85rem;
        }
        
        .form-control {
            font-size: 0.85rem;
            padding: 0.375rem 0.5rem;
        }
        
        .input-group-text {
            padding: 0.375rem 0.5rem;
        }
    }

    /* Landscape Mode */
    @media (max-height: 600px) and (orientation: landscape) {
        .min-vh-100 {
            min-height: auto !important;
            padding: 1rem 0;
        }
        
        .card {
            max-height: 85vh;
        }
        
        .card-header {
            padding: 0.5rem 1rem;
        }
        
        .card-body {
            padding: 1rem;
        }
        
        .mb-3 {
            margin-bottom: 0.75rem !important;
        }
        
        .mb-4 {
            margin-bottom: 1rem !important;
        }
    }

    /* Animation */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: slideUp 0.4s ease-out;
    }

    /* Focus States */
    .form-control:focus,
    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 98, 230, 0.1);
    }

    /* Form Check */
    .form-check-input:checked {
        background-color: #0062E6;
        border-color: #0062E6;
    }

    /* Custom Placeholder */
    ::placeholder {
        color: #adb5bd !important;
        opacity: 0.8;
    }

    /* Password Toggle Button */
    #togglePassword {
        transition: all 0.2s;
    }

    #togglePassword:hover {
        background-color: #e9ecef;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle icon
                const icon = this.querySelector('i');
                if (type === 'password') {
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            });
        }

        // Auto-dismiss alerts
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 4000);
        });

        // Enter key to submit form
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                const submitBtn = document.querySelector('button[type="submit"]');
                if (submitBtn) {
                    e.preventDefault();
                    submitBtn.click();
                }
            }
        });

        // Auto-focus on username field
        const usernameField = document.getElementById('username');
        if (usernameField) {
            setTimeout(() => {
                usernameField.focus();
            }, 300);
        }

        // Add subtle animation to inputs on focus
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.2s';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Remember me functionality
        const rememberCheckbox = document.getElementById('remember');
        const usernameField = document.getElementById('username');
        
        // Check if credentials are saved
        if (localStorage.getItem('rememberAdmin') === 'true') {
            rememberCheckbox.checked = true;
            const savedUsername = localStorage.getItem('adminUsername');
            if (savedUsername) {
                usernameField.value = savedUsername;
            }
        }
        
        // Save credentials if remember is checked
        rememberCheckbox.addEventListener('change', function() {
            if (this.checked) {
                localStorage.setItem('rememberAdmin', 'true');
                localStorage.setItem('adminUsername', usernameField.value);
            } else {
                localStorage.removeItem('rememberAdmin');
                localStorage.removeItem('adminUsername');
            }
        });
    });
</script>
@endpush