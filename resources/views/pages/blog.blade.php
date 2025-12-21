@extends('layouts.app')

@section('title', 'Berita - Jayatama')
@section('description', 'Berita terbaru dan informasi terkini dari Jayatama tentang layanan, kegiatan perusahaan, dan perkembangan terbaru di bidang tenaga kerja profesional')
@section('keywords', 'berita Jayatama, artikel tenaga kerja, update layanan security, informasi perusahaan')
@section('body-class', 'blog-page')

@section('content')
<main class="main" style="padding-top: 80px;">

  
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset('assets/img/page-title-bg.jpg') }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;"> <!-- Tambah padding-top di sini -->
            <h1 style="margin-top: 30px;">Berita & Artikel</h1> <!-- Tambah margin-top di judul -->
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="current">Berita</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Admin Panel Quick Access (hanya tampil jika admin) -->
            @if(session('admin_logged_in'))
            <div class="admin-panel-quick mb-5">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-speedometer2 me-2"></i>Panel Admin</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">
                                <i class="bi bi-list-ul me-2"></i>Kelola Berita
                            </a>
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Berita Baru
                            </a>
                            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row gy-4">
                @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <article class="h-100 blog-card">
                        <!-- Hapus position-relative dari parent -->
                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset($blog['image']) }}" class="img-fluid" alt="{{ $blog['title'] }}">
                            <span class="post-date">
                                {{ date('d M', strtotime($blog['created_at'])) }}
                            </span>
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
                            <p class="excerpt">
                                {{ Str::limit($blog['excerpt'], 150) }}
                            </p>
                            <hr>
                            <a href="{{ route('blog.show', $blog['slug']) }}" class="readmore align-self-start mb-2">
                                <span>Baca Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <!-- Admin actions -->
                            @if(session('admin_logged_in'))
                            <div class="admin-actions mt-2 pt-2 border-top">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.blog.edit', $blog['id']) }}" 
                                    class="btn btn-outline-warning btn-sm" title="Edit">
                                        <i class="bi bi-pencil me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $blog['id']) }}" 
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </article>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-newspaper display-1 text-muted"></i>
                        <h3 class="mt-3">Belum ada berita</h3>
                        <p class="text-muted">Belum ada berita yang tersedia saat ini.</p>
                        
                        @if(session('admin_logged_in'))
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                        </a>
                        @else
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-primary mt-3">
                            <i class="bi bi-shield-lock me-2"></i>Login sebagai Admin
                        </a>
                        @endif
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section><!-- /Blog Posts Section -->

</main>
@endsection

@push('styles')
<style>
    .blog-page .page-title {
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px;
        position: relative;
        color: white;
    }

    .blog-page .page-title::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .blog-page .page-title .container {
        position: relative;
        z-index: 1;
    }

    .blog-page .page-title h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    /* Admin Panel */
    .admin-panel-quick .card {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .admin-actions {
        font-size: 0.85rem;
    }

    .admin-actions .btn-group-sm .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    /* Blog Cards */
    .blog-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        border: 1px solid #e9ecef;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .post-img {
        height: 200px;
        overflow: hidden;
    }

    .post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .blog-card:hover .post-img img {
        transform: scale(1.05);
    }

    .post-date {
        position: absolute;
        right: 15px;
        background: rgba(0, 123, 255, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    .post-content {
        padding: 20px;
        flex: 1;
    }

    .post-title {
        font-size: 1.1rem;
        margin-bottom: 12px;
        color: #2c3e50;
        font-weight: 600;
        line-height: 1.4;
        height: 3em;
        overflow: hidden;
    }

    .meta {
        color: #666;
        font-size: 0.85rem;
        margin-bottom: 12px;
    }

    .excerpt {
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
        font-size: 0.9rem;
        flex-grow: 1;
        height: 4.5em;
        overflow: hidden;
    }

    .readmore {
        color: #007bff;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .readmore:hover {
        color: #0056b3;
    }

    .readmore i {
        transition: transform 0.3s;
        font-size: 0.8rem;
    }

    .readmore:hover i {
        transform: translateX(5px);
    }

    /* Empty State */
    .empty-state {
        padding: 50px 0;
    }

    .empty-state .display-1 {
        font-size: 4rem;
        color: #dee2e6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-page .page-title {
            padding: 80px 0 40px;
        }

        .blog-page .page-title h1 {
            font-size: 2rem;
        }

        .admin-panel-quick .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .post-img {
            height: 180px;
        }

        .post-content {
            padding: 15px;
        }
    }

    @media (max-width: 576px) {
        .blog-page .page-title {
            padding: 60px 0 30px;
        }

        .blog-page .page-title h1 {
            font-size: 1.75rem;
        }

        .empty-state .display-1 {
            font-size: 3rem;
        }

        .admin-actions .btn-group {
            flex-direction: column;
            width: 100%;
        }

        .admin-actions .btn-group .btn {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Confirm delete
        document.querySelectorAll('form[onsubmit*="confirm"]').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                if (!confirm('Yakin ingin menghapus berita ini?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endpush 