<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories= Category::all();
       return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:255',
            'catgory_id'=>'required|exists:categories,id',
            'cover'=>"mimes:jpg,jpeg,png"

         ]);

         $post = new Post();
         $post->title=$request->title;
         $post->description=$request->description;
         $post->catgory_id= $request->catgory_id;
         if($request->hasfile('cover')){
            $post->cover = $request->file('cover')->store('images/posts');
         }
       
         $post->save();
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $post=Post::find($id);
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:255',
            'catgory_id'=>'required|exists:categories,id',
            'cover'=>"mimes:jpg,jpeg,png"

         ]);
         $post=Post::find($id);
         $post->title=$request->title;
         $post->description=$request->description;
         $post->catgory_id= $request->catgory_id;
         if($request->hasfile('cover')){
            $post->cover = $request->file('cover')->store('images/posts');
         }

         $post->update();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        redirect(route('post.index'));
    }
}
