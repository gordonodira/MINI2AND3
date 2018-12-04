<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
class PostController extends Controller
{

    public function index()
    {
        $posts = Post::published()->paginate();
        return view('posts.index', compact('posts'));
    }

};

