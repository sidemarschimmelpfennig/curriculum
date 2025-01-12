<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

use Tests\TestCase;

class UserTest extends TestCase
{   
    //use RefreshDatabase;
    public function test_createUser() : void
    {
        
        $bodyJSON = [
            [
                'email' => 'user1@example.com',
                'password' => Hash::make(1),
                'is_admin' => 0
        
            ],
            [
                'email' => 'user2@example.com',
                'password' => Hash::make(2),
                'is_admin' => 1

            ],
            [
                'email' => 'user3@example.com',
                'password' => Hash::make(3),
                'is_admin' => 1

            ]
        ];
        
        foreach ($bodyJSON as $user) {
            $response= $this->post('/api/v1/add-user', $user);
        
            $response->assertStatus(200);    

        }
    }
    
 
}
