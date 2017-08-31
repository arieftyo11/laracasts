<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Given i have two records in the database that are post
        //and each one is ported a month apart
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([ 
        
            'created_at' => \Carbon\Carbon::now()->subMonth()
        
        ]);
        
        
        //when i fetch the archives
        $posts = Post::archives();
        
        //then response should be in proper format
        $this->assertEquals([
            
            [
            
            "year" => $first->created_at->format('Y'),
            "month" =>  $first->created_at->format('F'),
            "published" => 2
            
        ],
            
                        [
            
            "year" => $second->created_at->format('Y'),
            "month" =>  $second->created_at->format('F'),
            "published" => 2
            
        ],
            
        ], $posts);
        
        
    }
}
