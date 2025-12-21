<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageController extends Controller
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
                'password' => password_hash('admin123', PASSWORD_DEFAULT)
            ]));
        }
    }

    // ============================================
    // PUBLIC METHODS (FRONTEND)
    // ============================================

    public function index()
    {
        // Ambil 3 berita terbaru untuk ditampilkan di beranda
        $blogs = json_decode(File::get($this->blogFile), true);
        $recentBlogs = $blogs ? array_slice(array_reverse($blogs), 0, 3) : [];
        
        return view('pages.index', compact('recentBlogs'));
    }

    public function about()
    {
        return view('pages.about');
    }
    
    public function services()
    {
        return view('pages.services');
    }

    public function projects()
    {
        return view('pages.projects');
    }

    // Blog frontend - semua berita
    public function blog()
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ? array_reverse($blogs) : [];
        
        return view('pages.blog', compact('blogs'));
    }

    // Blog frontend - detail berita
    public function blogDetail($slug)
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        
        if (!$blogs) {
            abort(404);
        }
        
        $blog = collect($blogs)->firstWhere('slug', $slug);
        
        if (!$blog) {
            abort(404);
        }
        
        return view('pages.blog-detail', compact('blog'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function solusi()
    {
        return view('pages.solusi');
    }

    // Layanan methods
    public function security()
    {
        return view('pages.layanan.security');
    }

    public function officeService()
    {
        return view('pages.layanan.os');
    }

    public function driver()
    {
        return view('pages.layanan.driver');
    }

    public function messenger()
    {
        return view('pages.layanan.messenger');
    }

    public function teknisi()
    {
        return view('pages.layanan.teknisi');
    }

    public function foodBeverage()
    {
        return view('pages.layanan.fnb');
    }

    public function parking()
    {
        return view('pages.layanan.parking');
    }

    public function gondola()
    {
        return view('pages.layanan.gondola');
    }

    // ============================================
    // ADMIN AUTHENTICATION METHODS
    // ============================================

    public function adminLogin()
    {
        // Jika sudah login, redirect ke admin
        if (session('admin_logged_in')) {
            return redirect()->route('admin.blog.index');
        }
        
        return view('admin.login');
    }

    public function adminLoginSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $auth = json_decode(File::get($this->authFile), true);
        
        if ($request->username == $auth['username'] && 
            password_verify($request->password, $auth['password'])) {
            
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.blog.index')->with('success', 'Login berhasil!');
        }
        
        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function adminLogout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('blog')->with('success', 'Logout berhasil!');
    }

    // ============================================
    // ADMIN BLOG CRUD METHODS
    // ============================================

    public function adminBlogIndex()
    {
        $this->checkAdmin();
        
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ? array_reverse($blogs) : [];
        
        return view('admin.blog.index', compact('blogs'));
    }

    public function adminBlogCreate()
    {
        $this->checkAdmin();
        return view('admin.blog.create');
    }

    public function adminBlogStore(Request $request)
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
        
        $newBlog = [
            'id' => uniqid(),
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category' => $request->category,
            'author' => $request->author,
            'image' => $imageName ? 'assets/img/blog/' . $imageName : 'assets/img/blog/default.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $blogs[] = $newBlog;
        File::put($this->blogFile, json_encode($blogs, JSON_PRETTY_PRINT));
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function adminBlogEdit($id)
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
        
        return view('admin.blog.edit', compact('blog'));
    }

    public function adminBlogUpdate(Request $request, $id)
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
                
                $blogs[$key] = [
                    'id' => $id,
                    'title' => $request->title,
                    'slug' => $slug,
                    'excerpt' => $request->excerpt,
                    'content' => $request->content,
                    'category' => $request->category,
                    'author' => $request->author,
                    'image' => $imageName,
                    'created_at' => $blog['created_at'],
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                
                break;
            }
        }
        
        File::put($this->blogFile, json_encode($blogs, JSON_PRETTY_PRINT));
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function adminBlogDestroy($id)
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
        
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil dihapus!');
    }

    // ============================================
    // HELPER METHODS
    // ============================================

    private function checkAdmin()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['auth' => 'Silakan login terlebih dahulu!']);
        }
    }

    // Method untuk mengambil berita terbaru (bisa dipakai di view lain jika perlu)
    public function getRecentBlogs($limit = 3)
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        return $blogs ? array_slice(array_reverse($blogs), 0, $limit) : [];
    }
}