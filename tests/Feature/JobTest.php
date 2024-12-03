<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $bodyJSON = [
            "name" => "Desenvolvedor C++",
            "department" => "Desenvolvimento Desktop",
            "department_categories" => "backend",
            "status" => "Aberta"
        ];

        $response= $this->post('/api/v1/add-job', $bodyJSON);

        $response->assertStatus(200);

    }
}
