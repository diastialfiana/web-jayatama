<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan - Jayatama</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #0dcaf0;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-admin {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .stats-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12);
        }

        .stats-card .card-body {
            padding: 1.25rem;
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #2c3e50;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .welcome-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0a58ca 100%);
            color: white;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            margin-bottom: 1.5rem;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            opacity: 0.1;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
            padding: 1.5rem;
        }

        .section-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
            border: none;
            margin-bottom: 1.5rem;
        }

        .section-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem 1.5rem;
            border-radius: 12px 12px 0 0;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .table-container {
            padding: 1.5rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f8fafc;
            border-bottom: 2px solid #e9ecef;
            color: #495057;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.875rem 1rem;
            border-top: none;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f5f9;
            color: #495057;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .badge-status {
            padding: 0.4rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.8rem;
            min-width: 90px;
            text-align: center;
        }

        .badge-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .badge-in-progress {
            background-color: rgba(13, 202, 240, 0.1);
            color: #055160;
            border: 1px solid rgba(13, 202, 240, 0.3);
        }

        .badge-resolved {
            background-color: rgba(25, 135, 84, 0.1);
            color: #0f5132;
            border: 1px solid rgba(25, 135, 84, 0.3);
        }

        .priority-badge {
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .priority-low {
            background-color: rgba(25, 135, 84, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(25, 135, 84, 0.3);
        }

        .priority-medium {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .priority-high {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .quick-actions {
            padding: 1.5rem;
        }

        .quick-action-btn {
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-weight: 500;
            transition: all 0.3s;
            text-align: left;
            margin-bottom: 0.75rem;
            border: 1px solid transparent;
        }

        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .action-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }

        .stats-list {
            padding: 1.5rem;
        }

        .stats-list-item {
            background: transparent;
            border: none;
            border-bottom: 1px solid #e9ecef;
            padding: 0.875rem 0;
        }

        .stats-list-item:last-child {
            border-bottom: none;
        }

        .stats-value {
            font-weight: 600;
            color: #2c3e50;
        }

        .complaint-id {
            font-family: 'Consolas', 'Monaco', monospace;
            font-weight: 600;
            color: #2c3e50;
            background: #f8f9fa;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            display: inline-block;
            font-size: 0.875rem;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }

        .empty-state-icon {
            color: #adb5bd;
            margin-bottom: 1rem;
        }

        .view-btn {
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .stats-card .card-body {
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .stats-icon {
                width: 48px;
                height: 48px;
                font-size: 1.25rem;
                margin-right: 0.75rem;
            }
            
            .welcome-content {
                padding: 1.25rem;
            }
            
            .section-header {
                padding: 1rem 1.25rem;
            }
            
            .table-container {
                padding: 1rem;
                overflow-x: auto;
            }
            
            .table {
                font-size: 0.875rem;
            }
            
            .table th,
            .table td {
                padding: 0.75rem 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand span {
                display: none;
            }
            
            .welcome-card h1 {
                font-size: 1.5rem;
            }
            
            .stat-label {
                font-size: 0.8rem;
            }
            
            .quick-action-btn {
                font-size: 0.9rem;
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.complaints.dashboard') }}">
                <i class="bi bi-headset me-2"></i><span>Panel Pengaduan</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.complaints.dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.complaints.index') }}">
                            <i class="bi bi-list-ul me-1"></i>Semua Pengaduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.blog.index') }}">
                            <i class="bi bi-newspaper me-1"></i>Kelola Berita
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-2"></i>
                            <span>{{ session('admin_complaints_username', 'Admin') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.complaints.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.complaints.index') }}">
                                <i class="bi bi-inbox me-2"></i>Semua Pengaduan
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                                <i class="bi bi-house-door me-2"></i>Beranda Utama
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}" target="_blank">
                                <i class="bi bi-envelope me-2"></i>Form Pengaduan
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="welcome-content">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="h3 mb-2 fw-bold">Selamat Datang, {{ session('admin_complaints_username', 'Admin') }}!</h1>
                        <p class="mb-0 opacity-90">Kelola pengaduan dari pelanggan dengan mudah dan efisien.</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-white bg-opacity-20 p-3 rounded d-inline-block">
                            <i class="bi bi-calendar-check fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="stat-number">{{ $stats['total'] ?? 0 }}</div>
                                <div class="stat-label">Total Pengaduan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="stat-number">{{ $stats['pending'] ?? 0 }}</div>
                                <div class="stat-label">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-info bg-opacity-10 text-info">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="stat-number">{{ $stats['in_progress'] ?? 0 }}</div>
                                <div class="stat-label">Diproses</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="stat-number">{{ $stats['resolved'] ?? 0 }}</div>
                                <div class="stat-label">Selesai</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Recent Complaints -->
            <div class="col-lg-8">
                <div class="section-card">
                    <div class="section-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="section-title">
                                <i class="bi bi-clock-history me-2 text-primary"></i>
                                Pengaduan Terbaru
                            </h5>
                            <span class="badge bg-light text-dark">
                                {{ count($recentComplaints ?? []) }} pengaduan
                            </span>
                        </div>
                    </div>
                    <div class="table-container">
                        @if(isset($recentComplaints) && count($recentComplaints) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pengirim</th>
                                            <th>Subjek</th>
                                            <th>Status</th>
                                            <th>Prioritas</th>
                                            <th style="width: 70px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentComplaints as $complaint)
                                        <tr>
                                            <td>
                                                @php
                                                    // Sama dengan format di index dan show
                                                    $displayId = $complaint['tracking_number'] ?? 
                                                                (isset($complaint['id_numeric']) ? 'JYT-' . str_pad($complaint['id_numeric'], 6, '0', STR_PAD_LEFT) : 
                                                                'JYT-' . str_pad($complaint['id'], 6, '0', STR_PAD_LEFT));
                                                @endphp
                                                <span class="complaint-id">{{ $displayId }}</span>
                                            </td>
                                            <td>
                                                <div class="fw-medium">{{ $complaint['name'] ?? 'N/A' }}</div>
                                                <small class="text-muted">{{ $complaint['email'] ?? 'N/A' }}</small>
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 200px;" title="{{ $complaint['subject'] ?? '' }}">
                                                    {{ Str::limit($complaint['subject'] ?? 'Tidak ada subjek', 40) }}
                                                </div>
                                            </td>
                                            <td>
                                                @if(isset($complaint['status']))
                                                    @if($complaint['status'] == 'pending')
                                                        <span class="badge-status badge-pending">Pending</span>
                                                    @elseif($complaint['status'] == 'in_progress')
                                                        <span class="badge-status badge-in-progress">Diproses</span>
                                                    @else
                                                        <span class="badge-status badge-resolved">Selesai</span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-secondary">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($complaint['priority']))
                                                    @php
                                                        $priorityClass = 'priority-' . $complaint['priority'];
                                                        $priorityText = $complaint['priority'] == 'low' ? 'Rendah' : 
                                                                       ($complaint['priority'] == 'medium' ? 'Sedang' : 'Tinggi');
                                                    @endphp
                                                    <span class="priority-badge {{ $priorityClass }}">{{ $priorityText }}</span>
                                                @else
                                                    <span class="badge bg-secondary">-</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                @if(isset($complaint['id']))
                                                    <a href="{{ route('admin.complaints.show', $complaint['id']) }}" 
                                                       class="btn btn-sm btn-outline-primary view-btn" title="Lihat Detail">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">
                                    <i class="bi bi-list-ul me-2"></i>Lihat Semua Pengaduan
                                </a>
                            </div>
                        @else
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-megaphone display-4"></i>
                                </div>
                                <h5 class="text-muted mb-2">Belum ada pengaduan</h5>
                                <p class="text-muted mb-4">Tidak ada pengaduan yang masuk saat ini.</p>
                                <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">
                                    <i class="bi bi-list-ul me-2"></i>Kelola Pengaduan
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="section-card mb-4">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi bi-lightning-charge me-2 text-primary"></i>
                            Aksi Cepat
                        </h5>
                    </div>
                    <div class="quick-actions">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.complaints.index') }}?status=pending" 
                               class="btn btn-warning text-white quick-action-btn d-flex align-items-center">
                                <div class="action-icon">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div class="text-start">
                                    <div class="fw-medium">Pengaduan Pending</div>
                                    <small class="opacity-90">{{ $stats['pending'] ?? 0 }} pengaduan</small>
                                </div>
                            </a>
                            
                            <a href="{{ route('admin.complaints.index') }}?status=in_progress" 
                               class="btn btn-info text-white quick-action-btn d-flex align-items-center">
                                <div class="action-icon">
                                    <i class="bi bi-gear"></i>
                                </div>
                                <div class="text-start">
                                    <div class="fw-medium">Sedang Diproses</div>
                                    <small class="opacity-90">{{ $stats['in_progress'] ?? 0 }} pengaduan</small>
                                </div>
                            </a>
                            
                            <a href="{{ route('admin.complaints.index') }}?status=resolved" 
                               class="btn btn-success text-white quick-action-btn d-flex align-items-center">
                                <div class="action-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="text-start">
                                    <div class="fw-medium">Pengaduan Selesai</div>
                                    <small class="opacity-90">{{ $stats['resolved'] ?? 0 }} pengaduan</small>
                                </div>
                            </a>
                            
                            <a href="{{ route('admin.complaints.index') }}?priority=high" 
                               class="btn btn-danger text-white quick-action-btn d-flex align-items-center">
                                <div class="action-icon">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </div>
                                <div class="text-start">
                                    <div class="fw-medium">Prioritas Tinggi</div>
                                    <small class="opacity-90">{{ $stats['high_priority'] ?? 0 }} pengaduan</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Today's Stats -->
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi bi-calendar-day me-2 text-primary"></i>
                            Statistik Hari Ini
                        </h5>
                    </div>
                    <div class="stats-list">
                        <div class="list-group">
                            <div class="stats-list-item d-flex justify-content-between align-items-center">
                                <span class="text-muted">Pengaduan Hari Ini</span>
                                <span class="badge bg-primary rounded-pill stats-value">{{ $stats['today'] ?? 0 }}</span>
                            </div>
                            <div class="stats-list-item d-flex justify-content-between align-items-center">
                                <span class="text-muted">Prioritas Tinggi</span>
                                <span class="badge bg-danger rounded-pill stats-value">{{ $stats['high_priority'] ?? 0 }}</span>
                            </div>
                            <div class="stats-list-item d-flex justify-content-between align-items-center">
                                <span class="text-muted">Direspon Hari Ini</span>
                                <span class="badge bg-success rounded-pill stats-value">{{ $stats['today_resolved'] ?? 0 }}</span>
                            </div>
                            <div class="stats-list-item d-flex justify-content-between align-items-center">
                                <span class="text-muted">Rata-rata Respon</span>
                                <span class="badge bg-info rounded-pill stats-value">{{ $stats['avg_response'] ?? '0' }} jam</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Actions -->
                <div class="section-card mt-4">
                    <div class="quick-actions">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.complaints.index') }}" class="btn btn-outline-primary quick-action-btn">
                                <i class="bi bi-list-ul me-2"></i>Kelola Semua Pengaduan
                            </a>
                            <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-secondary quick-action-btn">
                                <i class="bi bi-eye me-2"></i>Lihat Form Pengaduan
                            </a>
                            <button onclick="window.print()" class="btn btn-outline-info quick-action-btn">
                                <i class="bi bi-printer me-2"></i>Cetak Laporan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 pt-4 border-top text-center text-muted">
            <p class="mb-0">
                &copy; {{ date('Y') }} PT. Jasa Swadaya Utama (Jayatama)
                <br>
                <!-- Waktu akan diupdate oleh JavaScript -->
                <small>Dashboard Pengaduan • Terakhir diakses: <span id="waktu-terakhir">Loading...</span></small>
            </p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fungsi untuk format waktu Indonesia
        function formatWaktuIndonesia(dateString) {
            try {
                // Parse tanggal dari string
                const date = new Date(dateString);
                
                // Adjust untuk timezone Indonesia (UTC+7)
                const optionsDate = { 
                    timeZone: 'Asia/Jakarta',
                    day: '2-digit',
                    month: '2-digit', 
                    year: 'numeric' 
                };
                
                const optionsTime = { 
                    timeZone: 'Asia/Jakarta',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                };
                
                // Format tanggal (DD/MM/YYYY)
                const formattedDate = date.toLocaleDateString('id-ID', optionsDate);
                
                // Format waktu (HH:MM)
                const formattedTime = date.toLocaleTimeString('id-ID', optionsTime);
                
                return {
                    date: formattedDate,
                    time: formattedTime
                };
            } catch (error) {
                console.error('Error formatting date:', error);
                return {
                    date: 'N/A',
                    time: 'N/A'
                };
            }
        }

        // Fungsi untuk format waktu sekarang
        function formatWaktuSekarang() {
            const now = new Date();
            const options = { 
                timeZone: 'Asia/Jakarta',
                day: 'numeric',
                month: 'long', 
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            };
            
            return now.toLocaleDateString('id-ID', options);
        }

        // Update semua waktu di halaman
        function updateWaktuHalaman() {
            // Update waktu terakhir diakses di footer
            const waktuTerakhirElement = document.getElementById('waktu-terakhir');
            if (waktuTerakhirElement) {
                waktuTerakhirElement.textContent = formatWaktuSekarang();
            }
            
            // Update waktu di tabel pengaduan
            document.querySelectorAll('.waktu-tanggal, .waktu-jam').forEach(element => {
                const waktuString = element.getAttribute('data-waktu');
                const format = element.getAttribute('data-format');
                
                if (waktuString) {
                    const formattedTime = formatWaktuIndonesia(waktuString);
                    
                    if (format === 'date') {
                        element.textContent = formattedTime.date;
                    } else if (format === 'time') {
                        element.textContent = formattedTime.time + ' WIB';
                    }
                }
            });
        }

        // Inisialisasi saat DOM siap
        document.addEventListener('DOMContentLoaded', function() {
            // Update waktu saat halaman dimuat
            updateWaktuHalaman();
            
            // Tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Auto refresh every 60 seconds (optional)
            let refreshInterval;
            
            function startAutoRefresh() {
                refreshInterval = setInterval(() => {
                    fetch(window.location.href)
                        .then(response => {
                            if (response.ok) {
                                location.reload();
                            }
                        });
                }, 60000);
            }
            
            // Start auto refresh only if needed
            // startAutoRefresh();
            
            // Cleanup on page unload
            window.addEventListener('beforeunload', function() {
                if (refreshInterval) {
                    clearInterval(refreshInterval);
                }
            });
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl+1: Dashboard
                if (e.ctrlKey && e.key === '1') {
                    e.preventDefault();
                    window.location.href = "{{ route('admin.complaints.dashboard') }}";
                }
                
                // Ctrl+2: All Complaints
                if (e.ctrlKey && e.key === '2') {
                    e.preventDefault();
                    window.location.href = "{{ route('admin.complaints.index') }}";
                }
                
                // Ctrl+P: Pending
                if (e.ctrlKey && e.key === 'p') {
                    e.preventDefault();
                    window.location.href = "{{ route('admin.complaints.index') }}?status=pending";
                }
                
                // Ctrl+R: Refresh
                if (e.ctrlKey && e.key === 'r' && !e.shiftKey) {
                    e.preventDefault();
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>