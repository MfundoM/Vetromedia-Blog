<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class GuestController extends Controller
{
    /**
     * DISPLAY all user posts.
     *
     * @return View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('index')->with(compact('posts'));
    }

    /**
     * DISPLAY full user content.
     *
     * @return View
     */
    public function showBlog($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('guest.show-blog')->with(compact('post'));
    }
}
