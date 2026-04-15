<?php

namespace App\Modules\Student\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Student\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create(['name' => 'Sample Student']);

        // Uncomment to use factory if available
        // Student::factory()->count(10)->create();
    }
}
