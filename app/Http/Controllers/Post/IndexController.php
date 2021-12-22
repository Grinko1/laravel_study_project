<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        // $this->authorize('view', auth()->user());
        $data = $request->validated();

        //with copyPast

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        // dd($posts);
        return view('post.index', compact('posts'));

        //worked
        //    $query = Post::query();

        //    if (isset($data['category_id'])) {
        //        $query->where('category_id', $data['category_id']);
        //    }
        //    if (isset($data['title'])) {
        //     $query->where('title', 'like',  "%{$data['title']}%" );
        //    }
        //    if (isset($data['content'])) {
        //     $query->where('content', 'like',  "%{$data['content']}%" );
        //    }
        //    $posts =$query->get();
        //    dd($posts);
        // $posts = Post::paginate(10);
        // return view('post.index', compact('posts'));
    }
}
