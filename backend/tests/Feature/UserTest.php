<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    
    private $accessToken = null;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreateUsers()
    {
        $response = $this->post('/api/users', 
        [
            'name' => 'nakane',
            'email' => 'nakane17@mail.com',
            'password' => "Kronon1122",
        ]
        );
        // ->assertExactJson([
        // 'c' => true,
        // ]

        $response->assertStatus(201);
        $this->accessToken = $response->decodeResponseJson()['data']['token'];

        $response = $this
        ->withHeader('Accept','application/json')
        ->withHeader('Authorization', 'Bearer ' . $this->accessToken)
        ->get('/api/users/17');

        //dd($response);
        $response->assertStatus(200);
    }

        /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testDetailUsers()
    {
        
        //dd($this->accessToken);
        // $response = $this
        // ->withHeader('Accept','application/json')
        // ->withHeader('Authorization', 'Bearer ' . $this->accessToken)
        // ->get('/api/users/15');

        // //dd($response);
        // $response->assertStatus(200);
    }
}
