@extends('layouts.app')

@section('title', 'Detail Pengaduan - Admin Jayatama')
@section('body-class', 'admin-page')

@section('content')
@php
    // Helper function untuk format waktu Indonesia (sama seperti di index)
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
                'date_time' => $carbon->format('d M Y, H:i'),
                'date_time_full' => $carbon->format('d/m/Y H:i'),
                'days' => $days,
                'hours' => $carbon->diffInHours($now),
                'carbon' => $carbon
            ];
        } catch (\Exception $e) {
            return [
                'date' => 'N/A', 
                'time' => 'N/A', 
                'date_time' => 'N/A',
                'date_time_full' => 'N/A',
                'relative' => 'N/A',
                'days' => 0,
                'hours' => 0
            ];
        }
    }
    
    // Format waktu untuk complaint ini
    $waktuDibuat = formatWaktuIndonesia($complaint['created_at']);
    $waktuDiperbarui = isset($complaint['updated_at']) ? formatWaktuIndonesia($complaint['updated_at']) : null;
    
    // Hitung durasi
    $created = \Carbon\Carbon::parse($complaint['created_at'])->timezone('Asia/Jakarta');
    $now = \Carbon\Carbon::now('Asia/Jakarta');
    $interval = $created->diff($now);
@endphp

<div class="container-fluid py-4" style="margin-top: 80px;"> 
    <div class="row">
        <div class="col-12">
            <!-- Header Section -->
            <div class="card mb-4 border-0 shadow-sm bg-white">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.complaints.index') }}" 
                                   class="btn btn-outline-secondary me-3">
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                                <div>
                                    <h1 class="h3 mb-1 fw-bold text-dark">Detail Pengaduan</h1>
                                    @php
                                        // Tentukan ID untuk display
                                        $displayId = $complaint['tracking_number'] ?? 
                                                    (isset($complaint['id_numeric']) ? 'JYT-' . str_pad($complaint['id_numeric'], 6, '0', STR_PAD_LEFT) : 
                                                    'JYT-' . substr($complaint['id'], 0, 8));
                                    @endphp
                                    <p class="text-muted mb-0">ID: {{ $displayId }}</p>
                                    @if(strlen($complaint['id']) > 10)
                                        <small class="text-muted d-block mt-1">
                                            UUID: {{ substr($complaint['id'], 0, 8) }}...
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <div class="d-flex flex-column flex-md-row justify-content-end gap-2">
                                @php
                                    $emailSubject = 'Respon Pengaduan ' . $displayId;
                                @endphp
                                <a href="mailto:{{ $complaint['email'] }}?subject={{ urlencode($emailSubject) }}" class="btn btn-primary">
                                    <i class="bi bi-envelope me-2"></i>Balas Email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left Column: Complaint Details -->
                <div class="col-lg-8 mb-4">
                    <!-- Complaint Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-chat-left-text me-2 text-primary"></i>
                                Isi Pengaduan
                            </h5>
                            <div>
                                @php
                                    $typeLabels = [
                                        'complaint' => 'Keluhan',
                                        'suggestion' => 'Saran',
                                        'question' => 'Pertanyaan'
                                    ];
                                    $typeColors = [
                                        'complaint' => 'danger',
                                        'suggestion' => 'info',
                                        'question' => 'secondary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $typeColors[$complaint['type']] ?? 'secondary' }}-subtle text-{{ $typeColors[$complaint['type']] ?? 'secondary' }} border border-{{ $typeColors[$complaint['type']] ?? 'secondary' }} px-3 py-2">
                                    {{ $typeLabels[$complaint['type']] ?? 'Keluhan' }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="mb-3 fw-bold">{{ $complaint['subject'] }}</h4>
                            <div class="mb-4 p-3 bg-light rounded">
                                <p class="mb-0" style="white-space: pre-wrap; line-height: 1.6;">{{ $complaint['message'] }}</p>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-4 pt-3 border-top">
                                <div>
                                    <span class="badge bg-light text-dark p-2">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $waktuDibuat['date_time'] }} WIB
                                    </span>
                                </div>
                                @if($waktuDiperbarui && $complaint['updated_at'] != $complaint['created_at'])
                                <div>
                                    <span class="badge bg-light text-dark p-2">
                                        <i class="bi bi-clock-history me-1"></i>
                                        Diperbarui: {{ $waktuDiperbarui['date_time'] }} WIB
                                    </span>
                                </div>
                                @endif
                                <div>
                                    <span class="badge bg-light text-dark p-2">
                                        <i class="bi bi-clock me-1"></i>
                                        Durasi: 
                                        @if($waktuDibuat['days'] > 0)
                                            {{ $waktuDibuat['days'] }} hari, {{ $waktuDibuat['hours'] % 24 }} jam
                                        @elseif($waktuDibuat['hours'] > 0)
                                            {{ $waktuDibuat['hours'] }} jam
                                        @else
                                            Kurang dari 1 jam
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status Form -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-gear me-2 text-primary"></i>
                                Update Status
                            </h5>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        <div>{{ session('success') }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-circle-fill me-2"></i>
                                        <div>{{ session('error') }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('admin.complaints.update.status', $complaint['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Status</label>
                                        <select name="status" class="form-select" required>
                                            <option value="pending" {{ $complaint['status'] == 'pending' ? 'selected' : '' }}>
                                                🟡 Pending
                                            </option>
                                            <option value="in_progress" {{ $complaint['status'] == 'in_progress' ? 'selected' : '' }}>
                                                🔵 Dalam Proses
                                            </option>
                                            <option value="resolved" {{ $complaint['status'] == 'resolved' ? 'selected' : '' }}>
                                                🟢 Selesai
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Prioritas</label>
                                        <select name="priority" class="form-select" required>
                                            <option value="low" {{ $complaint['priority'] == 'low' ? 'selected' : '' }}>
                                                🟢 Rendah
                                            </option>
                                            <option value="medium" {{ $complaint['priority'] == 'medium' ? 'selected' : '' }}>
                                                🟡 Sedang
                                            </option>
                                            <option value="high" {{ $complaint['priority'] == 'high' ? 'selected' : '' }}>
                                                🔴 Tinggi
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-medium">Catatan Admin</label>
                                        <textarea name="admin_notes" class="form-control" rows="4" 
                                                  placeholder="Tambahkan catatan internal untuk tim...">{{ $complaint['admin_notes'] ?? '' }}</textarea>
                                        <small class="text-muted">Catatan ini hanya terlihat oleh admin</small>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                                        </button>
                                        <a href="{{ route('admin.complaints.index') }}" class="btn btn-outline-secondary ms-2">
                                            <i class="bi bi-x-circle me-2"></i>Batal
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Admin Notes Section -->
                    @if(!empty($complaint['admin_notes']))
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-journal-text me-2 text-primary"></i>
                                Catatan Internal
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="p-3 bg-light rounded">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $complaint['admin_notes'] }}</p>
                            </div>
                            @if($waktuDiperbarui)
                            <small class="text-muted mt-2 d-block">
                                Diperbarui: {{ $waktuDiperbarui['date_time'] }} WIB
                            </small>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column: Sender Info & Actions -->
                <div class="col-lg-4">
                    <!-- Sender Info Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-person-circle me-2 text-primary"></i>
                                Informasi Pengirim
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar-lg bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <i class="bi bi-person fs-3 text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1 fw-bold">{{ $complaint['name'] }}</h5>
                                    <p class="text-muted mb-0">{{ $complaint['email'] }}</p>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted">Telepon</span>
                                    <span class="fw-medium">
                                        @if(!empty($complaint['phone']) && $complaint['phone'] != '-')
                                            {{ $complaint['phone'] }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted">Jenis Pengaduan</span>
                                    <span class="fw-medium">{{ $typeLabels[$complaint['type']] ?? 'Keluhan' }}</span>
                                </div>
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted">Dikirim Pada</span>
                                    <span class="fw-medium">{{ $waktuDibuat['date_time_full'] }} WIB</span>
                                </div>
                                <div class="list-group-item px-0 d-flex justify-content-between align-items-center py-2">
                                    <span class="text-muted">Lama Pengaduan</span>
                                    <span class="fw-medium">
                                        @if($waktuDibuat['days'] > 0)
                                            {{ $waktuDibuat['days'] }} hari, {{ $waktuDibuat['hours'] % 24 }} jam
                                        @elseif($waktuDibuat['hours'] > 0)
                                            {{ $waktuDibuat['hours'] }} jam
                                        @else
                                            Kurang dari 1 jam
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-info-circle me-2 text-primary"></i>
                                Status Saat Ini
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-medium">Status:</span>
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'in_progress' => 'info',
                                            'resolved' => 'success'
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Pending',
                                            'in_progress' => 'Dalam Proses',
                                            'resolved' => 'Selesai'
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $statusColors[$complaint['status']] }}-subtle text-{{ $statusColors[$complaint['status']] }} border border-{{ $statusColors[$complaint['status']] }} px-3 py-2">
                                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>
                                        {{ $statusLabels[$complaint['status']] }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-medium">Prioritas:</span>
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
                                    <span class="badge bg-{{ $priorityColors[$complaint['priority']] }}-subtle text-{{ $priorityColors[$complaint['priority']] }} border border-{{ $priorityColors[$complaint['priority']] }} px-3 py-2">
                                        <i class="bi bi-flag me-1"></i>
                                        {{ $priorityLabels[$complaint['priority']] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-lightning-charge me-2 text-primary"></i>
                                Aksi Cepat
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                @php
                                    $emailSubject = 'Respon Pengaduan ' . $displayId;
                                @endphp
                                <a href="mailto:{{ $complaint['email'] }}?subject={{ urlencode($emailSubject) }}" 
                                   class="btn btn-outline-primary d-flex align-items-center justify-content-center py-2">
                                    <i class="bi bi-envelope me-2"></i>
                                    Kirim Email Balasan
                                </a>
                                @if(!empty($complaint['phone']) && $complaint['phone'] != '-')
                                <a href="https://wa.me/62{{ preg_replace('/^0|\+62/', '', $complaint['phone']) }}" target="_blank"
                                   class="btn btn-outline-success d-flex align-items-center justify-content-center py-2">
                                    <i class="bi bi-whatsapp me-2"></i>
                                    Hubungi via WhatsApp
                                </a>
                                @endif
                                <form action="{{ route('admin.complaints.destroy', $complaint['id']) }}" 
                                      method="POST" class="d-grid">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-flex align-items-center justify-content-center py-2"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.')">
                                        <i class="bi bi-trash me-2"></i>
                                        Hapus Pengaduan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Card -->
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-clock-history me-2 text-primary"></i>
                                Timeline
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold mb-1">Pengaduan Dikirim</h6>
                                        <p class="text-muted mb-0">{{ $waktuDibuat['date_time'] }} WIB</p>
                                    </div>
                                </div>
                                @if($complaint['status'] == 'in_progress' && $waktuDiperbarui)
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold mb-1">Sedang Diproses</h6>
                                        <p class="text-muted mb-0">Dimulai: {{ $waktuDiperbarui['date_time'] }} WIB</p>
                                    </div>
                                </div>
                                @endif
                                @if($complaint['status'] == 'resolved' && $waktuDiperbarui)
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold mb-1">Selesai</h6>
                                        <p class="text-muted mb-0">{{ $waktuDiperbarui['date_time'] }} WIB</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
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

    /* Card Styling */
    .card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .card-header {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-bottom: 1px solid #e2e8f0;
        padding: 1.25rem 1.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Form Styling */
    .form-select, .form-control {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s;
    }

    .form-select:focus, .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        outline: none;
    }

    /* Button Styling */
    .btn {
        border-radius: 8px;
        padding: 0.625rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        border: none;
    }

    .btn-outline-primary:hover {
        background: #0d6efd;
        color: white;
    }

    .btn-outline-secondary:hover {
        background: #6c757d;
        color: white;
    }

    .btn-outline-success:hover {
        background: #198754;
        color: white;
    }

    .btn-outline-danger:hover {
        background: #dc3545;
        color: white;
    }

    /* Alert Styling */
    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 1rem 1.25rem;
    }

    .alert-success {
        background: linear-gradient(135deg, #d1e7dd 0%, #a3cfbb 100%);
        border-left: 4px solid #198754;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f1aeb5 100%);
        border-left: 4px solid #dc3545;
    }

    /* Avatar Styling */
    .avatar-lg {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0d6efd20 0%, #0a58ca20 100%);
    }

    /* List Group Styling */
    .list-group-item {
        border: none;
        padding: 0.75rem 0;
        background: transparent;
        border-bottom: 1px solid #f1f5f9;
    }

    .list-group-item:last-child {
        border-bottom: none !important;
    }

    /* Badge Styling */
    .badge {
        font-weight: 500;
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
    }

    /* Timeline Styles */
    .timeline {
        position: relative;
        padding-left: 30px;
        padding-top: 10px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }

    .timeline-marker {
        position: absolute;
        left: -12px;
        top: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px;
        z-index: 2;
    }

    .timeline-content {
        padding-left: 15px;
        padding-bottom: 10px;
        border-left: 2px solid #e2e8f0;
        position: relative;
    }

    .timeline-content::before {
        content: '';
        position: absolute;
        left: -2px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e2e8f0;
    }

    .timeline-item:last-child .timeline-content {
        border-left-color: transparent;
    }

    /* Footer Styling - Konsisten dengan halaman berita */
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
    }

    @media (max-width: 768px) {
        header .logo img {
            height: 50px !important;
        }
        
        .container-fluid.py-4 {
            padding: 1rem !important;
        }
        
        .card-header {
            padding: 1rem 1.25rem;
        }
        
        .card-body {
            padding: 1.25rem;
        }
        
        .btn {
            padding: 0.5rem 1.25rem;
            font-size: 0.9rem;
        }
        
        .avatar-lg {
            width: 50px;
            height: 50px;
        }
        
        .footer-spacer {
            height: 80px;
        }
        
        .timeline {
            padding-left: 25px;
        }
        
        .timeline-marker {
            left: -10px;
            width: 18px;
            height: 18px;
        }
    }

    @media (max-width: 576px) {
        .card {
            margin-bottom: 1rem;
        }
        
        .d-flex.flex-wrap.gap-3 {
            gap: 0.5rem !important;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .form-select, .form-control {
            font-size: 0.9rem;
            padding: 0.625rem 0.875rem;
        }
    }

    /* Animasi untuk smooth transition */
    * {
        scroll-behavior: smooth;
    }

    /* Print Styles */
    @media print {
        .btn, 
        .form-select, 
        .form-control, 
        .timeline,
        .mobile-nav-toggle,
        .footer-spacer {
            display: none !important;
        }
        
        .card {
            border: 1px solid #ddd !important;
            box-shadow: none !important;
            break-inside: avoid;
        }
        
        .card-header {
            background: #f8f9fa !important;
        }
        
        footer {
            display: none !important;
        }
        
        header {
            position: static !important;
        }
    }

    /* Loading animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeIn 0.5s ease-out;
    }

    /* Hover effect for timeline items */
    .timeline-item:hover .timeline-marker {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }

    .timeline-item:hover .timeline-content {
        border-left-color: #0d6efd;
    }

    /* Custom scrollbar for textareas */
    textarea::-webkit-scrollbar {
        width: 6px;
    }

    textarea::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }

    textarea::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
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
        
        // Close mobile menu on scroll
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

        // Form validation
        const complaintForm = document.querySelector('form[action*="update.status"]');
        if (complaintForm) {
            complaintForm.addEventListener('submit', function(e) {
                const statusSelect = this.querySelector('select[name="status"]');
                const prioritySelect = this.querySelector('select[name="priority"]');
                
                if (!statusSelect.value || !prioritySelect.value) {
                    e.preventDefault();
                    alert('Harap pilih status dan prioritas sebelum menyimpan.');
                    return false;
                }
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Menyimpan...';
                    submitBtn.disabled = true;
                    
                    // Restore button after 5 seconds (in case submission takes too long)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 5000);
                }
                
                return true;
            });
        }

        // Auto-save draft for admin notes (optional feature)
        const adminNotesTextarea = document.querySelector('textarea[name="admin_notes"]');
        if (adminNotesTextarea) {
            let saveTimeout;
            
            adminNotesTextarea.addEventListener('input', function() {
                clearTimeout(saveTimeout);
                
                // Save draft to localStorage
                saveTimeout = setTimeout(() => {
                    const complaintId = '{{ $complaint["id"] }}';
                    localStorage.setItem(`complaint_draft_${complaintId}`, this.value);
                    
                    // Show saved notification
                    const savedMsg = document.createElement('div');
                    savedMsg.className = 'alert alert-info alert-dismissible fade show position-fixed bottom-0 end-0 m-3';
                    savedMsg.style.zIndex = '9999';
                    savedMsg.innerHTML = `
                        <i class="bi bi-save me-2"></i>
                        Draft tersimpan
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    
                    document.body.appendChild(savedMsg);
                    
                    // Auto remove after 3 seconds
                    setTimeout(() => {
                        savedMsg.remove();
                    }, 3000);
                }, 1000);
            });
            
            // Load draft on page load
            const complaintId = '{{ $complaint["id"] }}';
            const savedDraft = localStorage.getItem(`complaint_draft_${complaintId}`);
            if (savedDraft && !adminNotesTextarea.value) {
                adminNotesTextarea.value = savedDraft;
            }
        }

        // Print functionality enhancement
        const printBtn = document.querySelector('button[onclick="window.print()"]');
        if (printBtn) {
            printBtn.addEventListener('click', function() {
                // Add loading state
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-printer me-2"></i>Mempersiapkan cetakan...';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 1000);
            });
        }
    });
</script>
@endpush