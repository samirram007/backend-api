<?php

namespace App\Modules\DocumentMetaData\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\DocumentMetaData\Models\DocumentMetaData;

class DocumentMetaDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_document_meta_datas(): void
    {
        $response = $this->getJson('/api/document_meta_datas');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_DocumentMetaData(): void
    {
        $data = ['name' => 'Test DocumentMetaData'];

        $response = $this->postJson('/api/document_meta_datas', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('document_meta_datas', $data);
    }

    public function test_can_show_DocumentMetaData(): void
    {
        $DocumentMetaData = DocumentMetaData::factory()->create();

        $response = $this->getJson('/api/document_meta_datas/' . $DocumentMetaData->id);
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

    public function test_can_update_DocumentMetaData(): void
    {
        $DocumentMetaData = DocumentMetaData::factory()->create();
        $data = ['name' => 'Updated DocumentMetaData'];

        $response = $this->putJson('/api/document_meta_datas/' . $DocumentMetaData->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('document_meta_datas', $data);
    }

    public function test_can_delete_DocumentMetaData(): void
    {
        $DocumentMetaData = DocumentMetaData::factory()->create();

        $response = $this->deleteJson('/api/document_meta_datas/' . $DocumentMetaData->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('document_meta_datas', ['id' => $DocumentMetaData->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/document_meta_datas', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
