<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
