<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
     public function index()
    {
        
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();
        
//        $posts = $posts->all();
//        $posts = (new \App\Repositories\Posts)->all();
//        $posts = Post::latest()
//            ->filter(request(['month', 'year']))
//            ->get();
        
        return view('posts.index', compact('posts'));
    }
    
     public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show', compact('post'));
    }
    
     public function create()
    {
        return view('posts.create');
    }
    
     public function store()
    {   
        //create post using the request
//        $post = new Post;
//        
//        $post->title = request('title');
//        $post->body = request('body');
//        
//        //save to database
//        $post->save();
//        dd(request()->all());
        $this->validate(request(),[
           
            'title' => 'required|max:10',
            'body' => 'required'
            
        ]);
        
        auth()->user()->publish(
        
            new Post(request(['title', 'body']))
            
        );
        
       
        session()->flash('message', 'Your post has been publish');
         
        
        //redirect to the homepage
        return redirect('/');
    }
}
