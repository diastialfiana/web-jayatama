<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

    // Frontend: List semua blog
    public function index()
    {
        $blogs = json_decode(File::get($this->blogFile), true);
        $blogs = $blogs ? array_reverse($blogs) : []; // Terbaru duluan
        
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
        
        return view('admin.blog.index', compact('blogs'));
    }

    // Admin: Create form
    public function create()
    {
        $this->checkAdmin();
        return view('admin.blog.create');
    }

    // Admin: Store blog
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
        
        return view('admin.blog.edit', compact('blog'));
    }

    // Admin: Update blog
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
}