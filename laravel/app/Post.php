<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
	//mass assignment protection
    protected $fillable = ['title', 'body', 'user_id'];
    
    public function comments()
    {
    	return $this->hasMany(Comment::class); //same as 'App\Comment'
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function addComment($body){
    	
    	Comment::create([
    			'body' => $body,
    			'post_id' => $this->id,
    			'user_id' => auth()->id
    	]);
    	
    	//$this->comments()->create(compact('body'));
    	
    }
    
    public function scopeFilter($query, $filters){
    	
    	$posts = Post::latest();
    	 
    	if($month = $filters['month']){
    	
    		$query->whereMonth('created_at', Carbon::parse($month)->month);
    	
    	}
    	 
    	if($year = $filters['year']){
    		 
    		$query->whereYear('created_at', $year);
    		 
    	}
    	 
    	$posts = $posts->get();
    	
    }
    
    public static function archives(){
    	
    	return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
    		->groupBy('year','month')
    		->orderByRaw('min(created_at) desc')
    		->get()
    		->toArray();
    	
    }
    
    public function tags(){
    	
    	//many to many relationship
    	return $this->belongsToMany(Tag::class);
    	
    }
}
