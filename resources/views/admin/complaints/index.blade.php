@extends('layouts.app')

@section('title', 'Kelola Pengaduan - Admin Jayatama')
@section('body-class', 'admin-page')

@section('content')
@php
    // Helper function untuk format waktu Indonesia
    function formatWaktuIndonesia($datetime) {
        if (!$datetime) return ['date' => 'N/A', 'time' => 'N/A', 'relative' => 'N/A'];
        
        try {
            $carbon = \Carbon\Carbon::parse($datetime);
            $carbon->setTimezone('Asia/Jakarta');
            
            $now = \Carbon\Carbon::now('Asia/Jakarta');
            $days = $carbon->diffInDays($now);
            
            if ($carbon->isToday()) {
                $relative = '<span class="badge bg-success bg-opacity-10 text-success">Hari ini</span>';
            } elseif ($days == 1) {
                $relative = '<span class="badge bg-info bg-opacity-10 text-info">Kemarin</span>';
            } elseif ($days <= 7) {
                $relative = '<span class="badge bg-warning bg-opacity-10 text-warning">' . $days . ' hari lalu</span>';
            } else {
                $relative = '<span class="badge bg-secondary bg-opacity-10 text-secondary">' . $days . ' hari lalu</span>';
            }
            
            return [
                'date' => $carbon->format('d M Y'),
                'time' => $carbon->format('H:i'),
                'relative' => $relative
            ];
        } catch (\Exception $e) {
            return ['date' => 'N/A', 'time' => 'N/A', 'relative' => 'N/A'];
        }
    }
@endphp

<div class="container-fluid py-4" style="margin-top: 80px;"> 
    <div class="row">
        <div class="col-12">
            <!-- Header Section dengan Card -->
            <div class="card mb-4 border-0 shadow-sm bg-white">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-wrapper bg-primary bg-gradient rounded-3 p-3 me-3">
                                    <i class="bi bi-megaphone text-white fs-2"></i>
                                </div>
                                <div>
                                    <h1 class="h3 mb-1 fw-bold text-dark">Kelola Pengaduan</h1>
                                    <p class="text-muted mb-0">Kelola pengaduan dan keluhan dari pengguna</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <div class="d-flex flex-column flex-md-row justify-content-end gap-2">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.complaints.dashboard') }}" 
                                       class="btn btn-outline-success d-flex align-items-center">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        <span>Dashboard</span>
                                    </a>
                                    <a href="{{ route('admin.blog.index') }}" 
                                        class="btn btn-outline-info d-flex align-items-center">
                                        <i class="bi bi-newspaper me-2"></i>
                                        <span>Kelola Berita</span>
                                    </a>
                                    <form action="{{ route('admin.complaints.logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center">
                                            <i class="bi bi-box-arrow-right me-2"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                        Total Pengaduan</div>
                                    <div class="h5 mb-0 fw-bold text-dark">{{ $complaintsCollection->total() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-list-check fs-1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                        Pending</div>
                                    <div class="h5 mb-0 fw-bold text-dark">
                                        {{ \App\Http\Controllers\ComplaintController::countByStatus('pending') }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-clock fs-1 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                        Dalam Proses</div>
                                    <div class="h5 mb-0 fw-bold text-dark">
                                        {{ \App\Http\Controllers\ComplaintController::countByStatus('in_progress') }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-gear fs-1 text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                        Selesai</div>
                                    <div class="h5 mb-0 fw-bold text-dark">
                                        {{ \App\Http\Controllers\ComplaintController::countByStatus('resolved') }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-check-circle fs-1 text-success"></i>
                                </div>
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

            <!-- Filter Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3">
                    <form method="GET" action="{{ route('admin.complaints.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select" name="status" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="priority" onchange="this.form.submit()">
                                <option value="">Semua Prioritas</option>
                                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Rendah</option>
                                <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Sedang</option>
                                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Tinggi</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date" value="{{ request('date') }}" onchange="this.form.submit()">
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari pengaduan..." 
                                       name="search" value="{{ request('search') }}">
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold text-dark">
                            <i class="bi bi-list-ul me-2 text-primary"></i>
                            Daftar Pengaduan
                        </h5>
                        <span class="badge bg-light text-dark">
                            Menampilkan {{ $complaintsCollection->count() }} dari {{ $complaintsCollection->total() }} pengaduan
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($complaintsCollection->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="complaintsTable">
                            <thead class="table-light">
                                <tr>
                                    <th width="120" class="ps-4">ID</th>
                                    <th>Pengirim</th>
                                    <th>Subjek</th>
                                    <th width="120">Status</th>
                                    <th width="120">Prioritas</th>
                                    <th width="150">Tanggal</th>
                                    <th width="150" class="text-center pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($complaintsCollection as $complaint)
                                <tr class="border-bottom complaint-row" 
                                    data-status="{{ $complaint['status'] }}"
                                    data-priority="{{ $complaint['priority'] }}"
                                    data-date="{{ date('Y-m-d', strtotime($complaint['created_at'])) }}">
                                    <td class="ps-4">
                                        <div class="d-flex flex-column">
                                            @php
                                                // Tentukan ID untuk display
                                                $displayId = $complaint['tracking_number'] ?? 
                                                            (isset($complaint['id_numeric']) ? 'JYT-' . str_pad($complaint['id_numeric'], 6, '0', STR_PAD_LEFT) : 
                                                            'JYT-' . substr($complaint['id'], 0, 8));
                                            @endphp
                                            <span class="badge bg-light text-dark fw-bold mb-1">
                                                {{ $displayId }}
                                            </span>
                                            @if(strlen($complaint['id']) > 10)
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-dark mb-1">{{ $complaint['name'] }}</strong>
                                            <small class="text-muted">{{ $complaint['email'] }}</small>
                                            @if(!empty($complaint['phone']) && $complaint['phone'] != '-')
                                            <small class="text-muted">
                                                <i class="bi bi-telephone me-1"></i>{{ $complaint['phone'] }}
                                            </small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-dark mb-1">{{ Str::limit($complaint['subject'], 50) }}</strong>
                                            <small class="text-muted">
                                                @php
                                                    $typeLabels = [
                                                        'complaint' => 'Keluhan',
                                                        'suggestion' => 'Saran',
                                                        'question' => 'Pertanyaan'
                                                    ];
                                                @endphp
                                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1 rounded">
                                                    {{ $typeLabels[$complaint['type']] ?? 'Keluhan' }}
                                                </span>
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'in_progress' => 'info',
                                                'resolved' => 'success'
                                            ];
                                            $statusLabels = [
                                                'pending' => 'Pending',
                                                'in_progress' => 'Diproses',
                                                'resolved' => 'Selesai'
                                            ];
                                        @endphp
                                        <span class="badge bg-{{ $statusColors[$complaint['status']] }}-subtle text-{{ $statusColors[$complaint['status']] }} border border-{{ $statusColors[$complaint['status']] }} px-3 py-2 rounded-pill">
                                            {{ $statusLabels[$complaint['status']] }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $priorityColors = [
                                                'low' => 'success',
                                                'medium' => 'warning',
                                                'high' => 'danger'
                                            ];
                                            $priorityLabels = [
                                                'low' => 'Rendah',
                                                'medium' => 'Sedang',
                                                'high' => 'Tinggi'
                                            ];
                                        @endphp
                                        <span class="badge bg-{{ $priorityColors[$complaint['priority']] }}-subtle text-{{ $priorityColors[$complaint['priority']] }} border border-{{ $priorityColors[$complaint['priority']] }} px-3 py-2 rounded-pill">
                                            {{ $priorityLabels[$complaint['priority']] }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            // Format waktu dengan timezone Indonesia
                                            $waktu = formatWaktuIndonesia($complaint['created_at']);
                                        @endphp
                                        <div class="d-flex flex-column">
                                            <span class="text-dark fw-medium">{{ $waktu['date'] }}</span>
                                            <small class="text-muted">{{ $waktu['time'] }} WIB</small>
                                            <small class="text-muted mt-1">
                                                {!! $waktu['relative'] !!}
                                            </small>
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.complaints.show', $complaint['id']) }}" 
                                               class="btn btn-icon btn-outline-primary btn-sm" title="Detail" data-bs-toggle="tooltip">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @if($complaint['status'] != 'resolved')
                                            <form action="{{ route('admin.complaints.update.status', $complaint['id']) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="resolved">
                                                <input type="hidden" name="priority" value="{{ $complaint['priority'] }}">
                                                <button type="submit" class="btn btn-icon btn-outline-success btn-sm" 
                                                        title="Tandai Selesai" data-bs-toggle="tooltip">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <form action="{{ route('admin.complaints.destroy', $complaint['id']) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-outline-danger btn-sm" 
                                                        title="Hapus" data-bs-toggle="tooltip"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
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
                    <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                        <div class="text-muted">
                            Menampilkan {{ $complaintsCollection->count() }} dari {{ $complaintsCollection->total() }} pengaduan
                        </div>
                        <nav>
                            {{ $complaintsCollection->links() }}
                        </nav>
                    </div>

                    @else
                    <!-- Empty State -->
                    <div class="text-center py-5 px-4">
                        <div class="empty-state">
                            <div class="empty-state-icon mb-4">
                                <div class="bg-primary bg-gradient p-4 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-megaphone text-white display-4"></i>
                                </div>
                            </div>
                            <h3 class="h4 text-dark mb-3">Belum Ada Pengaduan</h3>
                            <p class="text-muted mb-4">Tidak ada pengaduan yang ditemukan dengan filter yang dipilih.</p>
                            <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
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
        height: 60px !important;
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

    /* Footer Styling - Sama seperti berita */
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

    /* Stats Cards Styling */
    .card.border-left-primary { border-left: 4px solid #0d6efd !important; }
    .card.border-left-warning { border-left: 4px solid #ffc107 !important; }
    .card.border-left-info { border-left: 4px solid #0dcaf0 !important; }
    .card.border-left-success { border-left: 4px solid #198754 !important; }
    
    .btn-icon:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    
    .btn-outline-success:hover {
        background-color: #198754;
        color: white;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    
    .empty-state {
        padding: 3rem 1rem;
    }
    
    .empty-state-icon {
        margin-bottom: 1.5rem;
    }
    
    .badge {
        font-weight: 500;
        font-size: 0.75rem;
    }
    
    .form-select, .form-control {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }
    
    .form-select:focus, .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .input-group .btn {
        border-radius: 0 8px 8px 0;
    }
    
    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
                    if (confirm('Apakah Anda yakin ingin menghapus pengaduan ini?\n\nTindakan ini tidak dapat dikembalikan.')) {
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

        // Filter form real-time update (optional enhancement)
        const filterForm = document.querySelector('form[action*="admin.complaints"]');
        if (filterForm) {
            const inputs = filterForm.querySelectorAll('select, input[type="date"], input[type="text"]');
            inputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Show loading state
                    const table = document.getElementById('complaintsTable');
                    if (table) {
                        table.classList.add('table-loading');
                    }
                    
                    // Submit form after short delay
                    setTimeout(() => {
                        filterForm.submit();
                    }, 300);
                });
            });
        }

        // Auto-refresh notifications (optional)
        let notificationCount = 0;
        
        function checkNewComplaints() {
            // In a real application, you would make an AJAX request here
            // This is just a placeholder
            fetch('/api/admin/complaints/new-count')
                .then(response => response.json())
                .then(data => {
                    if (data.count > notificationCount) {
                        notificationCount = data.count;
                        showNotification(`Ada ${data.count} pengaduan baru!`);
                    }
                })
                .catch(err => console.log('Error checking new complaints:', err));
        }

        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'alert alert-info alert-dismissible fade show position-fixed top-0 end-0 m-3';
            notification.style.zIndex = '9999';
            notification.innerHTML = `
                <i class="bi bi-bell-fill me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }

        // Check for new complaints every 30 seconds (optional)
        // setInterval(checkNewComplaints, 30000);
    });
</script>
@endpush