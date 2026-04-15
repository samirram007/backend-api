<?php

namespace App\Modules\Nurses\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Nurses\Models\Nurses;

class NursesTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_nurses(): void
    {
        $response = $this->getJson('/api/nurses');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Nurses(): void
    {
        $data = ['name' => 'Test Nurses'];

        $response = $this->postJson('/api/nurses', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('nurses', $data);
    }

    public function test_can_show_Nurses(): void
    {
        $Nurses = Nurses::factory()->create();

        $response = $this->getJson('/api/nurses/' . $Nurses->id);
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

    public function test_can_update_Nurses(): void
    {
        $Nurses = Nurses::factory()->create();
        $data = ['name' => 'Updated Nurses'];

        $response = $this->putJson('/api/nurses/' . $Nurses->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('nurses', $data);
    }

    public function test_can_delete_Nurses(): void
    {
        $Nurses = Nurses::factory()->create();

        $response = $this->deleteJson('/api/nurses/' . $Nurses->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('nurses', ['id' => $Nurses->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/nurses', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
