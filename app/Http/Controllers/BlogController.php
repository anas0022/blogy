<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment; 
use Auth;

class BlogController extends Controller
{
    public function profile() {
        $user = Auth::user(); 
        $blogs = $user->blogs; 
        return view('profile', compact('user', 'blogs'));
    }

    public function blog() {
        $user = Auth::user();
        return view('blog', compact('user'));
    }

    public function blogpost(Request $request)
{
    $request->validate([
        'head' => 'required|string',
        'blog' => 'required|string|min:20|max:200',
    ]);

    $blog = new Blog();
    $blog->head = $request->input('head');
    $blog->blog = $request->input('blog');
    $blog->user_id = Auth::id();

    if ($blog->save()) {
        return redirect()->route('profile')->with('success', 'Blog Added Successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to add Blog');
    }
}

    public function show(Blog $blog ,Request $request)
    {
        $request -> validate([
            'comment' => 'required',
        ]);
        $comments = $blog->comments;
        return view('blog', compact('blog', 'comments'));
    }
    public function storeComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);
    
        $comment = new Comment();
        $comment->blog_id = $request->input('blog_id');
        $comment->user_id = Auth::id();
        $comment->comment = $request->input('comment');
    
        if ($comment->save()) {
            return redirect()->back();
        } else {
            return view('profile');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
