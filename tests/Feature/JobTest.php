<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class JobTest extends TestCase
{
    public function testRoutes(): void
    {
        $responseGET = $this->get('/api/all/job-vacancies');

        $bodyJSON = [
            "name" => "Desenvolvimento Web 2",
            "department" => "Frontend",
            "department_categories" => "Desenvolvimento",
            "status" => "Aberto",

        ];

        $responsePOST = $this->post('/api/add-job', $bodyJSON);
        $responsePOST->assertStatus(200);
        $responseGET->assertStatus(200);
        
    }
}
