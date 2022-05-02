<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;

class KarmaRankingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_karma_position()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => rand(1, 100000),
            'count' => rand(1, 100000)
        ]);

        $response->assertStatus(200);
    }

    public function test_not_exists_user()
    {
        $max_id = User::max('id');

        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => $max_id + 1,
            'count' => rand(1, 10)
        ]);

        $response->assertStatus(200);
    }

    public function test_minus_user_id()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => -1,
            'count' => rand(1, 10)
        ]);

        $response->assertStatus(200);
    }

    public function test_minus_count()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => rand(1, 100000),
            'count' => -1
        ]);

        $response->assertStatus(200);
    }

    public function test_empty_variables()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => '',
            'count' => ''
        ]);

        $response->assertStatus(200);
    }

    public function test_empty_user_id()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => '',
            'count' => rand(1, 10)
        ]);

        $response->assertStatus(200);
    }

    public function test_empty_count()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => rand(1, 100000),
            'count' => ''
        ]);

        $response->assertStatus(200);
    }

    public function test_lower_position()
    {
        
        $user = User::where('karma_score', '=', User::max('karma_score'))->first();

        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => $user->id,
            'count' => rand(1, 10)
        ]);

        $response->assertStatus(200);
        
    }


    public function test_large_count()
    {
        $response = $this->post('/api/KarmaPosition' , [
            'user_id' => rand(1, 100000),
            'count' => 50000
        ]);

        $response->assertStatus(200);
        
    }
    
    public function test_database_Missing()
    {
        $this->assertDatabaseMissing ('users', [
            'username' => 'Azadalketaan'
            ]);
    }

    public function test_database_Has()
    {
        $user = User::find(rand(1, 100000));
        
        $this->assertDatabaseHas ('users', [
            'username' => $user->username
        ]);
    }

}
