<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);
        
    	$first = factory(Post::class)->create();
    	
    	$second = factory(Post::class)->create([
    			'created_at' => \Carbon\Carbon::now()->subMonth()
    	]);
    	
    	$posts = Post::archives();
    	
    	$this->assertCount(2, $posts);
    }
}
