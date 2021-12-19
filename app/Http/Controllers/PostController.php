<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
      
      
        $posts = Post::all();
      
      
       return view('post.index', compact('posts'));
    }

    public function create(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact( 'post','categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title'=>'required|string',
            'content' =>'string',
            'image' => 'string',
            'category_id' => '',
            'tags' =>''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);
        
        $post = Post::create($data);
            $post->tags()->attach($tags);
       
       return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
      
      return view('post.show', compact('post'));

    }

    public function edit (Post $post)
     {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
     } 

    public function update(Post $post)
    {
     
        $data = request()->validate([
            'title'=>'string',
            'content' =>'string',
            'image' => 'string',
            'category_id' => '',
            'tags' =>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy (Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

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
