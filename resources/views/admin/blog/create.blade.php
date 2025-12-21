{{-- create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Berita - Admin Jayatama')
@section('body-class', 'admin-page')

@section('content')
<div class="container-fluid py-4" style="margin-top: 80px;">
    <div class="row">
        <div class="col-12">
            <!-- Header Section dengan Card -->
            <div class="card mb-4 border-0 shadow-sm bg-white">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h1 class="h3 mb-1 fw-bold text-dark">Tambah Berita Baru</h1>
                                    <p class="text-muted mb-0">Tambah artikel dan berita perusahaan terbaru</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <div class="d-flex flex-column flex-md-row justify-content-end gap-2">
                                <a href="{{ route('blog') }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center" target="_blank">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Ringkasan <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="excerpt" name="excerpt" 
                                              rows="3" required>{{ old('excerpt') }}</textarea>
                                    <div class="form-text">Ringkasan singkat berita (maksimal 500 karakter)</div>
                                    @error('excerpt')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Konten <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content" name="content" 
                                              rows="10" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Perusahaan" {{ old('category') == 'Perusahaan' ? 'selected' : '' }}>Perusahaan</option>
                                        <option value="Layanan" {{ old('category') == 'Layanan' ? 'selected' : '' }}>Layanan</option>
                                        <option value="Kegiatan" {{ old('category') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                        <option value="Penghargaan" {{ old('category') == 'Penghargaan' ? 'selected' : '' }}>Penghargaan</option>
                                        <option value="Umum" {{ old('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="author" name="author" 
                                           value="{{ old('author') }}" required>
                                    @error('author')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar Utama</label>
                                    <input type="file" class="form-control" id="image" name="image" 
                                           accept="image/*">
                                    <div class="form-text">Ukuran maksimal 2MB. Format: JPG, PNG, GIF</div>
                                    @error('image')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    
                                    <div class="mt-2 text-center">
                                        <img id="imagePreview" src="{{ asset('assets/img/blog/default.jpg') }}" 
                                             alt="Preview" class="img-fluid rounded mt-2" 
                                             style="max-height: 200px; display: none;">
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <small>
                                        <i class="bi bi-info-circle me-2"></i>
                                        Field dengan tanda <span class="text-danger">*</span> wajib diisi.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Simpan Berita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Spacer untuk footer -->
<div class="footer-spacer" style="height: 80px;"></div>
@endsection

@push('styles')
<style>
    /* Perbaikan untuk Navbar */
    header {
        position: fixed !important;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        padding: 10px 0 !important;
    }

    /* Logo di Navbar */
    header .logo img {
        height: 60px !important; /* Kurangi ukuran logo */
        transition: all 0.3s ease;
    }

    /* Navbar Menu */
    .navmenu {
        display: flex;
        align-items: center;
    }

    .navmenu ul {
        margin: 0;
        padding: 0;
        display: flex;
        list-style: none;
        align-items: center;
    }

    .navmenu li {
        position: relative;
        margin: 0 8px;
    }

    .navmenu a {
        color: #e2e8f0 !important;
        padding: 10px 15px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .navmenu a:hover,
    .navmenu a.active {
        color: white !important;
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .navmenu .dropdown ul {
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        background: white;
        min-width: 220px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        padding: 10px 0;
        z-index: 1000;
    }

    .navmenu .dropdown:hover > ul {
        display: block;
    }

    .navmenu .dropdown ul li {
        margin: 0;
    }

    .navmenu .dropdown ul a {
        color: #475569 !important;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 0;
    }

    .navmenu .dropdown ul a:hover {
        color: #1e40af !important;
        background: #f1f5f9;
    }

    /* Mobile Nav Toggle */
    .mobile-nav-toggle {
        color: white;
        font-size: 24px;
        cursor: pointer;
        display: none;
    }

    /* Admin Page Styling */
    .admin-page {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
        
    }

    /* Header Card Styling */
    .icon-wrapper {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(13, 110, 253, 0.15);
    }

    .icon-wrapper:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(13, 110, 253, 0.25);
    }

    /* Card Styling */
    .card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Form Styling */
    .form-control:focus, .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.1);
    }

    /* Button Styling */
    .btn {
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Footer Styling */
    footer {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;
        color: white !important;
        padding: 2.5rem 0 !important;
        margin-top: 2rem !important;
        position: relative;
        z-index: 10;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #4f46e5, #3b82f6, #0ea5e9);
    }

    .footer-spacer {
        height: 100px;
        clear: both;
    }

    footer a {
        color: #cbd5e1 !important;
    }

    footer a:hover {
        color: white !important;
    }

    /* Responsive Design */
    @media (max-width: 1199px) {
        .navmenu {
            display: none;
        }
        
        .mobile-nav-toggle {
            display: block;
        }
        
        .navmenu.active {
            display: flex;
            position: fixed;
            top: 80px;
            right: 0;
            background: white;
            width: 300px;
            height: calc(100vh - 80px);
            flex-direction: column;
            padding: 20px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .navmenu.active ul {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        
        .navmenu.active li {
            margin: 5px 0;
            width: 100%;
        }
        
        .navmenu.active a {
            color: #475569 !important;
            width: 100%;
            padding: 12px 15px;
        }
        
        .navmenu.active .dropdown ul {
            position: static;
            box-shadow: none;
            background: #f8fafc;
        }
    }

        
        header .logo img {
            height: 50px !important;
        }
        
        .container-fluid.py-4 {
            padding: 1rem !important;
        }
        
        .footer-spacer {
            height: 80px;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .icon-wrapper {
            padding: 0.75rem !important;
        }
    }

    /* Image Preview */
    #imagePreview {
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        padding: 3px;
        background: white;
    }

    /* Alert Styling */
    .alert-info {
        background-color: #f0f9ff;
        border: 1px solid #bae6fd;
        color: #0369a1;
    }
</style>
@endpush

@push('scripts')
<script>
    // Preview image sebelum upload
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('imagePreview');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const navmenu = document.querySelector('.navmenu');
        
        if (mobileNavToggle && navmenu) {
            mobileNavToggle.addEventListener('click', function() {
                navmenu.classList.toggle('active');
                this.classList.toggle('bi-list');
                this.classList.toggle('bi-x');
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.navmenu') && !event.target.closest('.mobile-nav-toggle')) {
                    navmenu.classList.remove('active');
                    mobileNavToggle.classList.remove('bi-x');
                    mobileNavToggle.classList.add('bi-list');
                }
            });
        }
        
        // Auto-generate slug from title
        const titleInput = document.getElementById('title');
        if (titleInput) {
            titleInput.addEventListener('input', function() {
                const title = this.value;
                const slug = title
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                
                // If you have a slug field, update it
                const slugInput = document.getElementById('slug');
                if (slugInput) {
                    slugInput.value = slug;
                }
            });
        }
    });
</script>
@endpush