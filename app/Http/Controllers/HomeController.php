<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('name', 'LIKE', '%'.$request->search.'%')->take(10)->get();
        return view('home', compact('posts'));
    }
}
