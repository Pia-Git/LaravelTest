<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
	// /posts
    public function index()
    {
    	$posts = Post::latest()->get();
    	
    	return view('posts.index', compact('posts'));
    }
    
    // GET /posts/id
    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }
    
    // /posts/create
    public function create()
    {
    	return view('posts.create');
    }
    
    // POST /posts
    public function store(Request $request)
    {
    	//dd(request()->all());
    	
    	// create new post using request data
    	/*$post = new Post;
    	
    	$post->title = request('title');
    	$post->body = request('body');
    	
    	// save it to db
    	$post->save();*/
    	
    	// OR
    	/*Post::create([
    	 	
    	 	'title' => request('title'),
    	 	
    	 	'body' => request('body')
    	 	
    	]);*/
    	
    	// Validation
    	$this->validate(request(), [
    			'title' => 'required',
    			'body' => 'required'
    	]);
    	
    	Post::create(request(['title', 'body']));
    	
    	// and then redirect to home page
    	return redirect('/');
    	
    }
    
    // GET /posts/id/edit
    public function edit($id)
    {
    	
    }
    
    // PATCH /posts/id
    public function update(Request $request, $id)
    {
    	
    }
    
    // DELETE /posts/id
    public function destroy($id)
    {
    	
    }
}
