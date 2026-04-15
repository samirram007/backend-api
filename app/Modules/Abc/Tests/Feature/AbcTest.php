<?php

namespace App\Modules\Abc\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Abc\Models\Abc;

class AbcTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_abcs(): void
    {
        $response = $this->getJson('/api/abcs');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Abc(): void
    {
        $data = ['name' => 'Test Abc'];

        $response = $this->postJson('/api/abcs', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('abcs', $data);
    }

    public function test_can_show_Abc(): void
    {
        $Abc = Abc::factory()->create();

        $response = $this->getJson('/api/abcs/' . $Abc->id);
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

    public function test_can_update_Abc(): void
    {
        $Abc = Abc::factory()->create();
        $data = ['name' => 'Updated Abc'];

        $response = $this->putJson('/api/abcs/' . $Abc->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('abcs', $data);
    }

    public function test_can_delete_Abc(): void
    {
        $Abc = Abc::factory()->create();

        $response = $this->deleteJson('/api/abcs/' . $Abc->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('abcs', ['id' => $Abc->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/abcs', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
