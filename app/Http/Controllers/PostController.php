<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show()
    {
        $title = '';
        $awal = '';
        if (request('search') && request('user') || request('search') && request('category')) {
            $title = 'Hasil search';
        } else if (request('category')) {
            $awal = 'All Post ';
            $category = \App\Models\Category::where('slug', request('category'))->first();
            $title = 'in category ' . $category->name;
        } else if (request('user')) {
            $awal = 'All Post ';
            $user = \App\Models\User::where('username', request('user'))->first();
            $title = 'by ' . $user->name;
        } else {
            $title = 'All Post';
        }
        return view('blog', [
            "title" => $awal . $title,
            'active' => 'blog',
            "posts" => Post::with(['user', 'category'])->latest()->filter(request(['search', 'category', 'user']))->paginate(4)->withQueryString()
        ]);
    }
    public function detail(Post $post)
    {
        return view('detail', [
            "title" => "Blog",
            'active' => 'blog',
            "post" => $post
        ]);
    }
}
