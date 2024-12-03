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
            [
                "name" => "Desenvolvedor C++",
                "department" => "Desenvolvimento Desktop",
                "department_categories" => "backend",
                "status" => "Aberta"

            ],

            [
                "name" => "Desenvolvedor PHP Laravel",
                "department" => "Desenvolvimento Web",
                "department_categories" => "backend",
                "status" => "Aberta"
                
            ],
            [
                "name" => "Desenvolvedor C#",
                "department" => "Desenvolvimento Desktop",
                "department_categories" => "backend",
                "status" => "Fechada"
            ],
            [
                "name" => "Suporte técnico",
                "department" => "Suporte",
                "department_categories" => "Suporte",
                "status" => "Aberta"
                
            ]
        ];

        foreach ($bodyJSON as $job) {
            $response= $this->post('/api/v1/add-job', $job);

            $response->assertStatus(200);
        }

    }
}
