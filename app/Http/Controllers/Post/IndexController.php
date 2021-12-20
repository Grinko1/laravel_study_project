<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
