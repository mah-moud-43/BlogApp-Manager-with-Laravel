<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');  // منع الوصول إلى المقالات إذا لم يكن المستخدم مسجلاً
}
    // عرض جميع المقالات
    public function index()
    {
        $posts = Post::all(); // جلب جميع المقالات
        return view('posts.index', compact('posts')); // إرجاع عرض المقالات
    }

    // عرض صفحة إضافة مقال جديد
    public function create()
    {
        return view('posts.create');
    }

    // تخزين مقال جديد في قاعدة البيانات
    public function store(Request $request)
    {
        // إضافة user_id إذا كان غير موجود في البيانات المستلمة
        $data = $request->all();
        $data['user_id'] = auth()->user()->id; // إذا كنت تستخدم نظام تسجيل دخول

        $request->validate([
            'title' => 'required|unique:posts,title',
            'description' => 'required',
        ]);

        Post::create($data);

        return redirect()->route('posts.index');
    }

    // عرض مقال معين
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // عرض صفحة تعديل مقال
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // تحديث مقال في قاعدة البيانات
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index');
    }

    // حذف مقال من قاعدة البيانات
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
