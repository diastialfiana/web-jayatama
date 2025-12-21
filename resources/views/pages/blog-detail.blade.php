@extends('layouts.app')

@section('title', $blog['title'] . ' - Berita Jayatama')
@section('description', $blog['excerpt'])
@section('keywords', 'berita Jayatama, ' . $blog['category'] . ', ' . $blog['title'])
@section('body-class', 'blog-detail-page')

@section('content')
<main class="main" style="padding-top: 80px;">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url({{ asset($blog['image']) }}); margin-top: -80px;">
        <div class="container position-relative" style="padding-top: 40px;">
            <h1>{{ $blog['title'] }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('blog') }}">Berita</a></li>
                    <li class="current">{{ $blog['title'] }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Detail Section -->
    <section id="blog-detail" class="blog-detail section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="blog-article">
                        <!-- Article Meta -->
                        <div class="article-meta mb-4">
                            <div class="d-flex flex-wrap align-items-center gap-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2"></i>
                                    <span>{{ $blog['author'] }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar me-2"></i>
                                    <span>{{ date('d F Y', strtotime($blog['created_at'])) }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder me-2"></i>
                                    <span class="badge bg-primary">{{ $blog['category'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article Image -->
                        <div class="article-image mb-5">
                            <img src="{{ asset($blog['image']) }}" alt="{{ $blog['title'] }}" class="img-fluid rounded">
                        </div>

                        <!-- Article Content -->
                        <div class="article-content">
                            {!! nl2br(e($blog['content'])) !!}
                        </div>

                       <!-- Article Footer -->
                        <div class="article-footer mt-5 pt-4 border-top">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                                <div class="text-center text-md-start">
                                    <strong><i class="bi bi-person-circle me-2"></i>Ditulis oleh:</strong> 
                                    <span class="fw-medium">{{ $blog['author'] ?? 'Admin' }}</span>
                                </div>
                                <div class="text-center text-md-end">
                                    <small class="text-muted">
                                        <i class="bi bi-clock-history me-1"></i>
                                        @php
                                            // Cek apakah updated_at ada dan valid
                                            $lastUpdated = null;
                                            
                                            if (isset($blog['updated_at']) && !empty($blog['updated_at'])) {
                                                try {
                                                    // Coba parse tanggal dari berbagai format
                                                    $timestamp = strtotime($blog['updated_at']);
                                                    if ($timestamp !== false) {
                                                        $lastUpdated = date('d/m/Y H:i', $timestamp);
                                                    }
                                                } catch (Exception $e) {
                                                    // Jika error, gunakan tanggal default
                                                    $lastUpdated = date('d/m/Y H:i');
                                                }
                                            } else if (isset($blog['created_at']) && !empty($blog['created_at'])) {
                                                try {
                                                    // Fallback ke created_at jika updated_at tidak ada
                                                    $timestamp = strtotime($blog['created_at']);
                                                    if ($timestamp !== false) {
                                                        $lastUpdated = date('d/m/Y H:i', $timestamp);
                                                    }
                                                } catch (Exception $e) {
                                                    // Jika error juga, gunakan tanggal sekarang
                                                    $lastUpdated = date('d/m/Y H:i');
                                                }
                                            } else {
                                                // Default ke tanggal sekarang
                                                $lastUpdated = date('d/m/Y H:i');
                                            }
                                        @endphp
                                        
                                        Terakhir diperbarui: <span class="fw-medium">{{ $lastUpdated }}</span>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-4">
                            <a href="{{ route('blog') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section><!-- /Blog Detail Section -->

</main>
@endsection

@push('styles')
<style>
    .blog-detail-page .page-title {
        background-size: cover;
        background-position: center;
        padding: 120px 0 60px;
        position: relative;
        color: white;
        min-height: 400px;
    }

    .blog-detail-page .page-title::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 100%);
    }

    .blog-detail-page .page-title .container {
        position: relative;
        z-index: 1;
    }

    .blog-detail-page .page-title h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    /* Breadcrumbs */
    .breadcrumbs ol li a {
        color: rgba(255, 255, 255, 0.8);
    }

    .breadcrumbs ol li.current {
        color: white;
    }

    /* Article Styles */
    .blog-article {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .article-meta {
        color: #666;
        font-size: 0.95rem;
    }

    .article-image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content h2, .article-content h3 {
        color: #2c3e50;
        margin: 2rem 0 1rem;
        font-weight: 600;
    }

    .article-content h2 {
        font-size: 1.8rem;
    }

    .article-content h3 {
        font-size: 1.5rem;
    }

    .article-content ul, .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .article-content li {
        margin-bottom: 0.5rem;
    }

    .article-footer {
        color: #666;
        font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-detail-page .page-title {
            padding: 80px 0 40px;
            min-height: 300px;
        }

        .blog-detail-page .page-title h1 {
            font-size: 2rem;
        }

        .blog-article {
            padding: 25px;
        }

        .article-content {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .blog-detail-page .page-title {
            padding: 60px 0 30px;
            min-height: 250px;
        }

        .blog-detail-page .page-title h1 {
            font-size: 1.75rem;
        }

        .blog-article {
            padding: 20px;
        }

        .article-image img {
            max-height: 300px;
        }
    }
</style>
@endpush