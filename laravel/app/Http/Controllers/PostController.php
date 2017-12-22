<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Events\ThreadCreated;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostController extends Controller
{
	//must sign in to create a post
	public function __construct()
	{
		//only for logged in users
		$this->middleware('auth')->except(['index','show']);
	}
	
    public function index(Posts $posts/*DI*/)
    {
    	
    	//return session('message');
    	
    	$posts = $posts->all();
    	//$posts = (new \App\Repositories\Posts)->all();
    	
    	//$posts = Post::latest()
    	//  ->filter(request(['month','year']))
    	//  ->get();
    	  
    	//Archives
    	
    	//$archives = Post::archives();
    	
    	//return $archives;
    	
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
    	
    	auth()->user()->publish(
    		new Post(request(['title', 'body']))	
    	);
    	
    	session()->flash('message', 'Your post has now been published.');
    	
    	//event(new ThreadCreated(['name'=>'Some New Thread']));
    	
    	/*Post::create([
    			'title' => request('title'), 
    			'body' => request('body'),
    			'user_id' => auth()->id()
    	]);*/
    	
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
