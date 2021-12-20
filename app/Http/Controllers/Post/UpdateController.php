<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
      
        return redirect()->route('post.show', $post->id);
    }
}
