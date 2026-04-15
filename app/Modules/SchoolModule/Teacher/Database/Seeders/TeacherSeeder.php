<?php

namespace App\Modules\Teacher\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Teacher\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        Teacher::create(['name' => 'Sample Teacher']);

        // Uncomment to use factory if available
        // Teacher::factory()->count(10)->create();
    }
}
