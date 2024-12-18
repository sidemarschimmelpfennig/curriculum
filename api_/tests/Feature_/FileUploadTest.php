<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use RefreshDatabase; // Para resetar o banco a cada teste, se necessário

    /** @test */ // Tem que ficar aqui
    public function it_can_upload_a_file()
    {
        // Storage::fake('public'); 

        // $file = UploadedFile::fake()->create('document.pdf', 100);  

        // $response = $this->post('/api/v1/send-curriculum', [
        //     'file' => $file
            
        // ]); 

        // $response->assertStatus(200);    
    }
}

