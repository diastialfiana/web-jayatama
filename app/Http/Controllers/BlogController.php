<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogController extends Controller
{
    private $blogFile;
    private $authFile;

    public function __construct()
    {
        $this->blogFile = storage_path('app/blog.json');
        $this->authFile = storage_path('app/admin_auth.json');
        
        // Inisialisasi file jika belum ada
        if (!File::exists($this->blogFile)) {
            File::put($this->blogFile, json_encode([]));
        }
        
        // Inisialisasi file auth jika belum ada
        if (!File::exists($this->authFile)) {
            File::put($this->authFile, json_encode([
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT) // Password default
            ]));
        }
    }

    // Helper function untuk format waktu Indonesia (WIB)
    private function formatWaktuIndonesia($datetime)
    {
        if (!$datetime) {
            return [
                'date' => 'N/A', 
                'time' => 'N/A', 
                'date_time' => 'N/A',
                'month_day' => 'N/A',
                'relative' => 'N/A',
                'days' => 0,
                'hours' => 0
            ];
        }
        
        try {
            $carbon = Carbon::parse($datetime);
            
            // Tentukan timezone
            if ($carbon->getTimezone()->getName() === 'UTC') {
                $carbon->addHours(7); // Konversi UTC ke WIB (Asia/Jakarta)
            }
            
            // Atau langsung set timezone ke Asia/Jakarta
            $carbon->setTimezone('Asia/Jakarta');
            
            $now = Carbon::now('Asia/Jakarta');
            $days = $carbon->diffInDays($now);
            
            // Format bulan Indonesia
            $bulanIndonesia = [
                'Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr',
                'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Ags',
                'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
            ];
            
            // Format tanggal lengkap (25 Des 2023)
            $formattedDate = $carbon->format('d M Y');
            foreach ($bulanIndonesia as $en => $id) {
                $formattedDate = str_replace($en, $id, $formattedDate);
            }
            
            // Format bulan-hari saja (25 Des)
            $monthDay = $carbon->format('d M');
            foreach ($bulanIndonesia as $en => $id) {
                $monthDay = str_replace($en, $id, $monthDay);
            }
            
            // Waktu relatif
            $relativeText = '';
            if ($days === 0) {
                $relativeText = 'Hari ini';
            } elseif ($days === 1) {
                $relativeText = 'Kemarin';
            } elseif ($days <= 7) {
                $relativeText = $days . ' hari lalu';
            } else {
                $relativeText = $days . ' hari lalu';
            }
            
            return [
                'date' => $formattedDate,
                'time' => $carbon->format('H:i'),
                'date_time' => $formattedDate . ', ' . $carbon->format('H:i') . ' WIB',
                'date_time_full' => $carbon->format('d/m/Y H:i') . ' WIB',
                'month_day' => $monthDay,
                'relative' => $relativeText,
                'days' => $days,
                'hours' => $carbon->diffInHours($now),
                'carbon' => $carbon
            ];
        } catch (\Exception $e) {
            return [
                'date' => 'N/A', 
                'time' => 'N/A', 
                'date_time' => 'N/A',
                'month_day' => 'N/A',
                'relative' => 'N/A',
                'days' => 0,
                'hours' => 0
            ];
        }
    }

    // Frontend: List semua blog
    public function index()
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ? array_reverse($blogs) : []; // Terbaru duluan
        
        // Tambahkan formatted time untuk setiap blog
        $blogs = array_map(function($blog) {
            $blog['waktu'] = $this->formatWaktuIndonesia($blog['created_at']);
            return $blog;
        }, $blogs);
        
        return view('pages.blog', compact('blogs'));
    }

    // Frontend: Detail blog
    public function show($slug)
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        
        if (!$blogs) {
            abort(404);
        }
        
        $blog = collect($blogs)->firstWhere('slug', $slug);
        
        if (!$blog) {
            abort(404);
        }
        
        // Tambahkan formatted time
        $blog['waktu'] = $this->formatWaktuIndonesia($blog['created_at']);
        
        return view('pages.blog-detail', compact('blog'));
    }

    // Admin: Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $auth = json_decode(File::get($this->authFile), true);
        
        if ($request->username == $auth['username'] && 
            password_verify($request->password, $auth['password'])) {
            
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.blog.index');
        }
        
        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    // Admin: Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('blog');
    }

    // Middleware untuk admin
    private function checkAdmin()
    {
        if (!session('admin_logged_in')) {
            abort(403, 'Unauthorized');
        }
    }

    // Admin: List blog
    public function adminIndex()
    {
        $this->checkAdmin();
        
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ? array_reverse($blogs) : [];
        
        // Tambahkan formatted time untuk setiap blog
        $blogs = array_map(function($blog) {
            $blog['waktu'] = $this->formatWaktuIndonesia($blog['created_at']);
            return $blog;
        }, $blogs);
        
        return view('admin.blog.index', compact('blogs'));
    }

    // Admin: Create form
    public function create()
    {
        $this->checkAdmin();
        return view('admin.blog.create');
    }

    // Admin: Store blog - PERBAIKAN: Simpan waktu dalam format yang benar
    public function store(Request $request)
    {
        $this->checkAdmin();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:100'
        ]);
        
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ?: [];
        
        $slug = Str::slug($request->title) . '-' . time();
        
        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/blog'), $imageName);
        }
        
        // Simpan waktu dengan timezone Indonesia (WIB)
        $now = Carbon::now('Asia/Jakarta');
        
        $newBlog = [
            'id' => uniqid(),
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category' => $request->category,
            'author' => $request->author,
            'image' => $imageName ? 'assets/img/blog/' . $imageName : 'assets/img/blog/default.jpg',
            'created_at' => $now->toDateTimeString(), // Simpan dalam format WIB
            'updated_at' => $now->toDateTimeString()
        ];
        
        $blogs[] = $newBlog;
        File::put($this->blogFile, json_encode($blogs, JSON_PRETTY_PRINT));
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil ditambahkan');
    }

    // Admin: Edit form
    public function edit($id)
    {
        $this->checkAdmin();
        
        $blogs = json_decode(File::get($this->blogFile), true);
        
        if (!$blogs) {
            abort(404);
        }
        
        $blog = collect($blogs)->firstWhere('id', $id);
        
        if (!$blog) {
            abort(404);
        }
        
        // Tambahkan formatted time
        $blog['waktu'] = $this->formatWaktuIndonesia($blog['created_at']);
        
        return view('admin.blog.edit', compact('blog'));
    }

    // Admin: Update blog - PERBAIKAN: Update waktu dengan format yang benar
    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:100'
        ]);
        
        $blogs = json_decode(File::get($this->blogFile), true);
        
        if (!$blogs) {
            $blogs = [];
        }
        
        foreach ($blogs as $key => $blog) {
            if ($blog['id'] == $id) {
                // Handle image upload
                $imageName = $blog['image'];
                if ($request->hasFile('image')) {
                    // Hapus gambar lama jika bukan default
                    if ($imageName != 'assets/img/blog/default.jpg' && File::exists(public_path($imageName))) {
                        File::delete(public_path($imageName));
                    }
                    
                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('assets/img/blog'), $imageName);
                    $imageName = 'assets/img/blog/' . $imageName;
                }
                
                $slug = Str::slug($request->title) . '-' . time();
                
                // Update waktu dengan timezone Indonesia (WIB)
                $now = Carbon::now('Asia/Jakarta');
                
                $blogs[$key] = [
                    'id' => $id,
                    'title' => $request->title,
                    'slug' => $slug,
                    'excerpt' => $request->excerpt,
                    'content' => $request->content,
                    'category' => $request->category,
                    'author' => $request->author,
                    'image' => $imageName,
                    'created_at' => $blog['created_at'], // Pertahankan waktu pembuatan asli
                    'updated_at' => $now->toDateTimeString() // Update waktu dengan WIB
                ];
                
                break;
            }
        }
        
        File::put($this->blogFile, json_encode($blogs, JSON_PRETTY_PRINT));
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil diperbarui');
    }

    // Admin: Delete blog
    public function destroy($id)
    {
        $this->checkAdmin();
        
        $blogs = json_decode(File::get($this->blogFile), true);
        
        if (!$blogs) {
            return redirect()->route('admin.blog.index');
        }
        
        $newBlogs = [];
        foreach ($blogs as $blog) {
            if ($blog['id'] != $id) {
                $newBlogs[] = $blog;
            } else {
                // Hapus gambar jika bukan default
                if ($blog['image'] != 'assets/img/blog/default.jpg' && File::exists(public_path($blog['image']))) {
                    File::delete(public_path($blog['image']));
                }
            }
        }
        
        File::put($this->blogFile, json_encode($newBlogs, JSON_PRETTY_PRINT));
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil dihapus');
    }
    
    // Fungsi helper untuk testing waktu
    public function debugWaktu()
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        
        echo "<pre>";
        echo "=== DEBUG WAKTU BLOG ===\n\n";
        
        if ($blogs) {
            foreach ($blogs as $index => $blog) {
                echo "Blog #" . ($index + 1) . "\n";
                echo "ID: " . $blog['id'] . "\n";
                echo "Judul: " . $blog['title'] . "\n";
                echo "Created At (Original): " . $blog['created_at'] . "\n";
                
                $waktu = $this->formatWaktuIndonesia($blog['created_at']);
                echo "Formatted: " . $waktu['date_time'] . "\n";
                echo "Relative: " . $waktu['relative'] . "\n";
                echo "---\n";
            }
        } else {
            echo "Tidak ada data blog\n";
        }
        
        echo "\nWaktu server sekarang: " . date('Y-m-d H:i:s') . "\n";
        echo "Waktu WIB sekarang: " . Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s') . "\n";
        echo "Timezone server: " . date_default_timezone_get() . "\n";
        echo "</pre>";
    }
}