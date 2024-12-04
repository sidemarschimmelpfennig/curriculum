<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use RefreshDatabase; // Para resetar o banco a cada teste, se necessário

    /** @test */
    public function it_can_upload_a_file()
    {
        // Simulando que estamos testando a criação de arquivos
        Storage::fake('public'); // Utiliza o disco fake para testes, sem alterar os arquivos reais

        // Criando um arquivo simulado
        $file = UploadedFile::fake()->create('document.pdf', 100);  // Criando um PDF fictício de 100KB

        // Enviando o arquivo via POST
        $response = $this->post('/api/v1/send-curriculum', [
            'file' => $file,
        ]);

        // Verificando se o arquivo foi salvo no disco
        Storage::disk('public')->assertExists('uploads/' . $file->hashName()); // Verifica se o arquivo está no local correto

        // Verificando se a resposta foi correta (neste caso, esperamos que a página redirecione com sucesso)
        $response->assertStatus(200);    
    }
}

