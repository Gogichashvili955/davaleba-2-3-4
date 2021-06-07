<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with(['tags'])->paginate(10);
        return view('posts',compact('posts'));

    }
    public function show($id){
        $post = Post::findOrFail($id);
        return view('post')->with('post',$post);
    }
    public function create(){
        $tags = Tag::all();
        return view('create', compact('tags'));
    }

    public function save(Request $request){
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
        ]);
        $post=new Post($request->all());
        $post->save();
        $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($postid){
        $post=Post::findOrFail($postid);
        $tags=Tag::with('posts')->get();
        foreach ($tags as $tag){

        }
        return view('edit',compact('post','tags'));
    }

    public function update(Request $request, $postid){
        $post=Post::findOrFail($postid);
        $post->update($request->all());
        if ( $post->tags()->detach($request->tags)==true){
            $post->tags()->detach($request->tags);
        }else{
            $post->tags()->attach($request->tags);
        }

        return redirect()->back();
    }
    public function delete($id){
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }

}
