<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    private $complaintFile;
    private $authFile;

    public function __construct()
    {
        $this->complaintFile = storage_path('app/complaints.json');
        $this->authFile = storage_path('app/admin_auth.json');
        
        // Inisialisasi file complaints jika belum ada
        if (!File::exists($this->complaintFile)) {
            File::put($this->complaintFile, json_encode([]));
        }
    }

    // ==================== PUBLIC ====================
    
    // Submit form pengaduan
    public function submit(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|in:complaint,suggestion,question',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Baca data complaints yang ada
        $complaints = [];
        if (File::exists($this->complaintFile)) {
            $content = File::get($this->complaintFile);
            $complaints = json_decode($content, true) ?: [];
        }

        // Generate ID baru
        // 1. Format tanggal: YYYYMMDD
        $datePart = now()->format('Ymd');
        
        // 2. Generate bagian acak (6 karakter, uppercase)
        $randomPart = Str::upper(Str::random(6));
        
        // 3. Gabungkan menjadi tracking number baru
        $newTrackingNumber = 'JTM-' . $datePart . '-' . $randomPart;
        
        // 4. ID numerik tetap untuk referensi internal
        $lastId = 0;
        foreach ($complaints as $c) {
            if (isset($c['id_numeric']) && $c['id_numeric'] > $lastId) {
                $lastId = $c['id_numeric'];
            }
        }
        $newIdNumeric = $lastId + 1;
        
        // Data pengaduan baru
        $newComplaint = [
            'id' => (string) Str::uuid(), // UUID untuk referensi internal
            'id_numeric' => $newIdNumeric, // ID numerik berurutan untuk display
            'tracking_number' => $newTrackingNumber, // <-- FORMAT BARU
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'pending',
            'priority' => 'medium',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'admin_notes' => null,
            'deleted_at' => null
        ];

        // Tambahkan ke array
        $complaints[] = $newComplaint;

        // Simpan ke file
        File::put($this->complaintFile, json_encode($complaints, JSON_PRETTY_PRINT));

        return response()->json([
            'success' => true,
            'message' => 'Pengaduan berhasil dikirim',
            'data' => [
                'tracking_number' => $newComplaint['tracking_number'],
                'id' => $newIdNumeric,
                'created_at' => $newComplaint['created_at']
            ]
        ]);

    } catch (\Exception $e) {
        \Log::error('Complaint submission error: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan server: ' . $e->getMessage()
        ], 500);
    }
}

    // ==================== ADMIN AUTHENTICATION ====================
    
    // Show login form (gunakan login yang sama dengan berita)
    public function showLoginForm()
    {
        // Redirect jika sudah login
        if (session('admin_logged_in')) {
            return redirect()->route('admin.complaints.dashboard');
        }
        
        return view('admin.login'); // Gunakan view login yang sama
    }
    
    // Process login (gunakan yang sama dengan berita)
    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Cek kredensial sederhana - SAMA dengan login berita
        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged_in' => true]); // Session name SAMA
            session(['admin_username' => $request->username]);
            
            return redirect()->route('admin.complaints.dashboard')
                ->with('success', 'Login berhasil!');
        }
        
        return back()->withErrors([
            'login' => 'Username atau password salah!'
        ])->withInput();
    }
    
    // Admin logout (logout semua admin)
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_username']);
        
        return redirect()->route('admin.login')
            ->with('success', 'Logout berhasil!');
    }
    
    // Admin dashboard
    public function dashboard()
    {
        $this->checkAdmin();
        
        // Get statistics
        $complaints = $this->getComplaints();
        
        // Statistics
        $stats = [
            'total' => count($complaints),
            'pending' => count(array_filter($complaints, fn($c) => $c['status'] === 'pending')),
            'in_progress' => count(array_filter($complaints, fn($c) => $c['status'] === 'in_progress')),
            'resolved' => count(array_filter($complaints, fn($c) => $c['status'] === 'resolved')),
            'high_priority' => count(array_filter($complaints, fn($c) => $c['priority'] === 'high')),
            'today' => count(array_filter($complaints, function($c) {
                return date('Y-m-d', strtotime($c['created_at'])) === date('Y-m-d');
            }))
        ];
        
        // Get recent complaints
        usort($complaints, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        
        $recentComplaints = array_slice($complaints, 0, 5);
        
        return view('admin.complaints.dashboard', compact('stats', 'recentComplaints'));
    }
    
    // ==================== ADMIN COMPLAINT MANAGEMENT ====================
    
    // Admin: List semua pengaduan
    public function index()
    {
        $this->checkAdmin();
        
        // Baca data complaints
        $complaints = $this->getComplaints();
        
        // Filter berdasarkan status
        if ($status = request('status')) {
            $complaints = array_filter($complaints, function($c) use ($status) {
                return $c['status'] == $status;
            });
        }
        
        // Filter berdasarkan priority
        if ($priority = request('priority')) {
            $complaints = array_filter($complaints, function($c) use ($priority) {
                return $c['priority'] == $priority;
            });
        }
        
        // Filter berdasarkan date
        if ($date = request('date')) {
            $complaints = array_filter($complaints, function($c) use ($date) {
                return date('Y-m-d', strtotime($c['created_at'])) == $date;
            });
        }
        
        // Filter berdasarkan search
        if ($search = request('search')) {
            $search = strtolower($search);
            $complaints = array_filter($complaints, function($c) use ($search) {
                return strpos(strtolower($c['name']), $search) !== false ||
                       strpos(strtolower($c['email']), $search) !== false ||
                       strpos(strtolower($c['subject']), $search) !== false ||
                       strpos(strtolower($c['message']), $search) !== false ||
                       strpos(strtolower($c['tracking_number'] ?? ''), $search) !== false;
            });
        }
        
        // Urutkan berdasarkan ID terbaru (descending)
        usort($complaints, function($a, $b) {
            $idA = $a['id_numeric'] ?? 0;
            $idB = $b['id_numeric'] ?? 0;
            return $idB - $idA;
        });
        
        // Pagination manual
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedItems = array_slice($complaints, $offset, $perPage);
        
        // Buat paginator manual
        $complaintsCollection = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedItems,
            count($complaints),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.complaints.index', compact('complaintsCollection'));
    }

    // Admin: Tampilkan detail pengaduan
    public function show($id)
    {
        $this->checkAdmin();
        
        // Baca data complaints
        $complaints = $this->getComplaints();
        
        // Cari complaint berdasarkan ID (bisa ID atau tracking_number)
        $complaint = null;
        foreach ($complaints as $c) {
            if ($c['id'] == $id) {
                $complaint = $c;
                break;
            }
        }
        
        if (!$complaint) {
            abort(404, 'Pengaduan tidak ditemukan');
        }

        return view('admin.complaints.show', compact('complaint'));
    }

    // Admin: Update status pengaduan
    public function updateStatus(Request $request, $id)
    {
        $this->checkAdmin();
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,in_progress,resolved',
            'priority' => 'required|in:low,medium,high',
            'admin_notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Baca data complaints
        $complaints = json_decode(File::get($this->complaintFile), true);
        $complaints = $complaints ?: [];
        
        $updated = false;
        foreach ($complaints as &$complaint) {
            if ($complaint['id'] == $id) {
                $complaint['status'] = $request->status;
                $complaint['priority'] = $request->priority;
                $complaint['updated_at'] = now()->toDateTimeString();
                
                if ($request->filled('admin_notes')) {
                    $complaint['admin_notes'] = $request->admin_notes;
                }
                
                $updated = true;
                break;
            }
        }
        
        if ($updated) {
            File::put($this->complaintFile, json_encode($complaints, JSON_PRETTY_PRINT));
            return redirect()->route('admin.complaints.show', $id)
                ->with('success', 'Status pengaduan berhasil diperbarui.');
        } else {
            return redirect()->back()
                ->with('error', 'Pengaduan tidak ditemukan');
        }
    }

    // Admin: Hapus pengaduan
    public function destroy($id)
    {
        $this->checkAdmin();
        
        // Baca data complaints
        $complaints = json_decode(File::get($this->complaintFile), true);
        $complaints = $complaints ?: [];
        
        $newComplaints = [];
        $deleted = false;
        foreach ($complaints as $complaint) {
            if ($complaint['id'] != $id) {
                $newComplaints[] = $complaint;
            } else {
                $deleted = true;
            }
        }
        
        if ($deleted) {
            File::put($this->complaintFile, json_encode($newComplaints, JSON_PRETTY_PRINT));
            return redirect()->route('admin.complaints.index')
                ->with('success', 'Pengaduan berhasil dihapus.');
        } else {
            return redirect()->back()
                ->with('error', 'Pengaduan tidak ditemukan');
        }
    }
    
    // ==================== HELPER FUNCTIONS ====================
    
    // Middleware untuk admin - Gunakan session yang SAMA
    private function checkAdmin()
    {
        if (!session('admin_logged_in')) {
            // Redirect to login instead of aborting
            return redirect()->route('admin.login')->send();
        }
        return true;
    }
    
    // Get active complaints
    private function getComplaints()
    {
        if (!File::exists($this->complaintFile)) {
            return [];
        }
        
        $complaints = json_decode(File::get($this->complaintFile), true);
        $complaints = $complaints ?: [];
        
        // Filter yang tidak dihapus
        $filtered = array_filter($complaints, function($complaint) {
            return empty($complaint['deleted_at']);
        });
        
        // Generate tracking number untuk data lama yang belum punya
        foreach ($filtered as &$complaint) {
            if (!isset($complaint['tracking_number']) && isset($complaint['id_numeric'])) {
                $complaint['tracking_number'] = 'JTM-' . str_pad($complaint['id_numeric'], 6, '0', STR_PAD_LEFT);
            }
        }
        
        return $filtered;
    }
    
    // Count complaints by status (untuk stats)
    public static function countByStatus($status)
    {
        $filePath = storage_path('app/complaints.json');
        
        if (!File::exists($filePath)) {
            return 0;
        }
        
        $complaints = json_decode(File::get($filePath), true);
        $complaints = $complaints ?: [];
        
        $count = 0;
        foreach ($complaints as $complaint) {
            if (empty($complaint['deleted_at']) && $complaint['status'] == $status) {
                $count++;
            }
        }
        
        return $count;
    }
    
    // Total complaints (untuk stats)
    public static function totalComplaints()
    {
        $filePath = storage_path('app/complaints.json');
        
        if (!File::exists($filePath)) {
            return 0;
        }
        
        $complaints = json_decode(File::get($filePath), true);
        $complaints = $complaints ?: [];
        
        $count = 0;
        foreach ($complaints as $complaint) {
            if (empty($complaint['deleted_at'])) {
                $count++;
            }
        }
        
        return $count;
    }
}