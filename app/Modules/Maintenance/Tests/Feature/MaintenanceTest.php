<?php

namespace App\Modules\Maintenance\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Maintenance\Models\Maintenance;

class MaintenanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_maintenances(): void
    {
        $response = $this->getJson('/api/maintenances');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Maintenance(): void
    {
        $data = ['name' => 'Test Maintenance'];

        $response = $this->postJson('/api/maintenances', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('maintenances', $data);
    }

    public function test_can_show_Maintenance(): void
    {
        $Maintenance = Maintenance::factory()->create();

        $response = $this->getJson('/api/maintenances/' . $Maintenance->id);
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

    public function test_can_update_Maintenance(): void
    {
        $Maintenance = Maintenance::factory()->create();
        $data = ['name' => 'Updated Maintenance'];

        $response = $this->putJson('/api/maintenances/' . $Maintenance->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('maintenances', $data);
    }

    public function test_can_delete_Maintenance(): void
    {
        $Maintenance = Maintenance::factory()->create();

        $response = $this->deleteJson('/api/maintenances/' . $Maintenance->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('maintenances', ['id' => $Maintenance->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/maintenances', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
