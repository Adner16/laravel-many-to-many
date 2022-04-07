<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::all(); 
        $posts = Post::all();
        $tags = Tag::all();
        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all(); 
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|min:3|unique:posts',
            'content' => 'required',
            'image' => 'url|nullable',
        ],[
            'title.min' => 'minimo 3 caratteri',
            'title.required' =>'titolo obbligatorio',
        ]);
        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        // $post->title = $data['title'];
        // $post->content = $data['content'];
        // $post->image = $data['image'];
        $post->save();

        if (array_key_exists('tags', $data))
            $post->tags()->attach($data['tags']);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all(); 
        $tags = Tag::all();
        $post_tags = $post->tags->pluck('id')->toArray();
        return view('posts.edit' , compact('post', 'categories', 'tags', 'post_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        $post->update($data);

        if (array_key_exists('tags', $data))
            $post->tags()->sync($data['tags']);
        else $post->tags()->detach();
        
        return redirect()->route('admin.posts.show' , compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
