<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithFaker;

    public function test_get_all_authors()
    {
        $response = $this->get('/api/authors');
        $response->assertStatus(200);
    }

    public function test_get_random_author()
    {
        $response = $this->get('/api/authors/'.rand());
        $response->assertStatus(200);
    }


    public function test_delete_author()
    {
        $author = Author::create([
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName()
        ])->make(); //add last delete first
        $author_first = Author::pluck('id')->first();
        if($author_first && $author){
            $response = $this->delete('/api/authors/'.$author_first);
        }
        $response->assertStatus(200);
    }

}
