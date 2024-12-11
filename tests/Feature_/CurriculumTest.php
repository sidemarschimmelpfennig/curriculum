<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class CurriculumTest extends TestCase
{
    public function test_createCurriculum(): void
    {
        $bodyJSON = [
            'full_name' => 'Gabriel Kochem',
            'email' => 'gabikochem55@gmail.com',
            'contactphone' => '+55 49 999482859',
            'additional_info' => 'Lindo',
            'ability' => 'Foda'

        ];

        $response= $this->post('/api/create', $bodyJSON);

        $response->assertStatus(200);

    }

}
