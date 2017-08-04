<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	//mass assignment protection
	protected $fillable = ['user_id', 'body', 'post_id'];
	
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
