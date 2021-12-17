<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts  = Post::where('is_published', 1)->first();
        dump($posts->title);
        // dd($posts);
        // return  $posts;
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'title of post',
                'content' => 'content of post',
                'image' => 'image of post',
                'likes' => 12,
                'is_published' => 1,
            ],
            [
                'title' => 'second title of post',
                'content' => 'second content of post',
                'image' => 'second image of post',
                'likes' => 1,
                'is_published' => 1,
            ]
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }
    public function update()
    {
        $post = Post::find(4);
        $post->update([
            'title' => 'updated title of post',
            'content' => 'updated content of post',
            'image' => 'updated image of post',
            'likes' => 1,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    public function delete()
    {
        // delete 
        //    $post = Post::find(4);
        //    $post->delete();
        //    dd('deleted');

        //restore
        $post = Post::withTrashed()->find(4);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate()
    {
        // $post = Post::find(1);

        $anotherPost = [
            'title' => 'some first or created title of post',
            'content' => 'some first or created content of post',
            'image' => 'some first or created image of post',
            'likes' => 15,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some first or created title of post',
        ],[
            'title' => 'some first or created title of post',
            'content' => 'some first or created content of post',
            'image' => 'some first or created image of post',
            'likes' => 15,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('done');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updateOrCreate some first of post',
            'content' => 'updateOrCreate some content of post',
            'image' => 'updateOrCreate some image of post',
            'likes' => 15,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate([
            'title' => 'updateOrCreate some first of post',
        ],[
            'title' => 'updateOrCreate some first of post',
            'content' => 'update some content of post ',
            'image' => 'update  some image of post',
            'likes' => 15,
            'is_published' => 1,
        ]);
        dd('updateOrCreate');
    }
}
