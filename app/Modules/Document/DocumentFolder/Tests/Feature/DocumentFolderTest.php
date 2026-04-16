<?php

namespace App\Modules\Document\DocumentFolder\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Document\DocumentFolder\Models\DocumentFolder;

class DocumentFolderTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_document_folders(): void
    {
        $response = $this->getJson('/api/document_folders');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);
    }

    public function test_can_create_DocumentFolder(): void
    {
        $data = ['name' => 'Test DocumentFolder'];

        $response = $this->postJson('/api/document_folders', $data);
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('document_folders', $data);
    }

    public function test_can_show_DocumentFolder(): void
    {
        $DocumentFolder = DocumentFolder::factory()->create();

        $response = $this->getJson('/api/document_folders/' . $DocumentFolder->id);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ],
                'status',
                'code',
                'message'
            ]);
    }

    public function test_can_update_DocumentFolder(): void
    {
        $DocumentFolder = DocumentFolder::factory()->create();
        $data = ['name' => 'Updated DocumentFolder'];

        $response = $this->putJson('/api/document_folders/' . $DocumentFolder->id, $data);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('document_folders', $data);
    }

    public function test_can_delete_DocumentFolder(): void
    {
        $DocumentFolder = DocumentFolder::factory()->create();

        $response = $this->deleteJson('/api/document_folders/' . $DocumentFolder->id);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseMissing('document_folders', ['id' => $DocumentFolder->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/document_folders', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
