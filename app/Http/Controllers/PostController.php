<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function view()
    {
        //get current logged in use
        $user = Auth::user();
        //load post
        $post = Post::find(1);

        if ($user->can('view', $post)) {
            echo "User Allowed to Update Post:{$post->id}";
        } else {
        echo    'Not Authorized';
        }
    }

    public function create()
    {
        //get current logged in use
        $user = Auth::user();
        //load post


        if ($user->can('create', Post::class)) {
            echo "User Allowed to Create Post";
        } else {
          echo  'Not Authorized';

        }
        exit;
    }

    public function update()
    {
        //get current logged in use
        $user = Auth::user();

        //load post
        $post = Post::find(1);

        if ($user->can('update', $post)) {
            echo "User Allowed to Update Post:{$post->id}";
        } else {
            echo 'Not Authorized';
        }
    }

    public function delete()
    {
        //get current logged in use
        $user = Auth::user();
        //load post
        $post = Post::find(1);

        if ($user->can('delete', $post)) {
            echo "User Allowed to Update Post:{$post->id}";
        } else {
            echo 'Not Authorized';
        }
    }
}