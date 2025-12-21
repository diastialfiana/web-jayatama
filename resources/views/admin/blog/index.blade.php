@extends('layouts.app')

@section('title', 'Kelola Berita - Admin Jayatama')
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
                                    <h1 class="h3 mb-1 fw-bold text-dark">Kelola Berita</h1>
                                    <p class="text-muted mb-0">Kelola artikel dan berita perusahaan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <div class="d-flex flex-column flex-md-row justify-content-end gap-2">
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    <span>Tambah Berita</span>
                                </a>
                                <a href="{{ route('blog') }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center mb-2 mb-md-0" target="_blank">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <div class="flex-grow-1">{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
                        <div class="flex-grow-1">{{ session('error') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold text-dark">
                            <i class="bi bi-list-ul me-2 text-primary"></i>
                            Daftar Berita
                        </h5>
                        <span class="badge bg-light text-dark">
                            Total: {{ count($blogs) }} Berita
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if(count($blogs) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="text-center ps-4">#</th>
                                    <th width="100" class="text-center">Gambar</th>
                                    <th>Judul Berita</th>
                                    <th width="120">Kategori</th>
                                    <th width="150">Penulis</th>
                                    <th width="120">Tanggal</th>
                                    <th width="150" class="text-center pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $index => $blog)
                                <tr class="border-bottom">
                                    <td class="text-center ps-4">
                                        <span class="badge bg-light text-dark fw-normal rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="image-wrapper position-relative">
                                            <img src="{{ asset($blog['image']) }}" alt="{{ $blog['title'] }}" 
                                                 class="img-thumbnail rounded" width="60" height="60" 
                                                 style="object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-dark mb-1">{{ $blog['title'] }}</strong>
                                            <small class="text-muted">{{ Str::limit($blog['excerpt'], 60) }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill">
                                            {{ $blog['category'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                            <span class="text-dark">{{ $blog['author'] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark fw-medium">{{ date('d M Y', strtotime($blog['created_at'])) }}</span>
                                            <small class="text-muted">{{ date('H:i', strtotime($blog['created_at'])) }} WIB</small>
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('blog.show', $blog['slug']) }}" 
                                               class="btn btn-icon btn-outline-info btn-sm" target="_blank" 
                                               title="Lihat" data-bs-toggle="tooltip">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blog.edit', $blog['id']) }}" 
                                               class="btn btn-icon btn-outline-warning btn-sm" title="Edit" data-bs-toggle="tooltip">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.blog.destroy', $blog['id']) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-outline-danger btn-sm" title="Hapus" data-bs-toggle="tooltip">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(isset($blogs->links))
                    <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                        <div class="text-muted">
                            Menampilkan {{ $blogs->count() }} dari {{ $blogs->total() }} berita
                        </div>
                        <nav>
                            {{ $blogs->links() }}
                        </nav>
                    </div>
                    @endif

                    @else
                    <!-- Empty State -->
                    <div class="text-center py-5 px-4">
                        <div class="empty-state">
                            <div class="empty-state-icon mb-4">
                                <div class="bg-primary bg-gradient p-4 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-newspaper text-white display-4"></i>
                                </div>
                            </div>
                            <h3 class="h4 text-dark mb-3">Belum Ada Berita</h3>
                            <p class="text-muted mb-4">Mulai dengan menambahkan berita pertama Anda untuk ditampilkan di website.</p>
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-lg px-4 py-2">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Spacer untuk footer -->
<div class="footer-spacer" style="height: 100px;"></div>
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

    .container-fluid.py-4 {
        padding-top: 2rem !important;
        padding-bottom: 3rem !important;
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
    }

    .card-header {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-bottom: 1px solid #e2e8f0;
    }

    /* Table Improvements */
    .table th {
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
        color: #475569;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1rem 0.75rem;
    }

    .table td {
        border-color: #f1f5f9;
        vertical-align: middle;
        padding: 1.25rem 0.75rem;
        background-color: white;
    }

    .table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f1f5f9;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border-bottom-color: #e2e8f0;
    }

    /* Button Icon Styling */
    .btn-icon {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-icon:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    }

    /* Animasi untuk smooth transition */
    * {
        scroll-behavior: smooth;
    }

    /* Loading state untuk table */
    .table-loading {
        position: relative;
        min-height: 200px;
    }

    .table-loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Mobile Nav Toggle
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const navmenu = document.getElementById('navmenu');
        
        if (mobileNavToggle && navmenu) {
            mobileNavToggle.addEventListener('click', function() {
                navmenu.classList.toggle('active');
                this.classList.toggle('bi-list');
                this.classList.toggle('bi-x');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.navmenu') && !event.target.closest('.mobile-nav-toggle')) {
                    navmenu.classList.remove('active');
                    mobileNavToggle.classList.remove('bi-x');
                    mobileNavToggle.classList.add('bi-list');
                }
            });
        }
        
        // Close dropdowns on scroll for mobile
        window.addEventListener('scroll', function() {
            if (window.innerWidth <= 1199) {
                navmenu.classList.remove('active');
                if (mobileNavToggle) {
                    mobileNavToggle.classList.remove('bi-x');
                    mobileNavToggle.classList.add('bi-list');
                }
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu
                    if (window.innerWidth <= 1199) {
                        navmenu.classList.remove('active');
                        if (mobileNavToggle) {
                            mobileNavToggle.classList.remove('bi-x');
                            mobileNavToggle.classList.add('bi-list');
                        }
                    }
                }
            });
        });
        
        // Delete confirmation
        document.addEventListener('submit', function(e) {
            if (e.target.closest('form')) {
                const form = e.target.closest('form');
                if (form.method === 'POST' && form.querySelector('input[name="_method"][value="DELETE"]')) {
                    e.preventDefault();
                    if (confirm('Apakah Anda yakin ingin menghapus berita ini?\n\nTindakan ini tidak dapat dikembalikan.')) {
                        form.submit();
                    }
                }
            }
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.style.padding = '5px 0 !important';
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2)';
            } else {
                header.style.padding = '10px 0 !important';
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
            }
        });
    });
</script>
@endpush