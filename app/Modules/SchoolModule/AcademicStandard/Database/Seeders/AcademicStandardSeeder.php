<?php

namespace App\Modules\AcademicStandard\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\AcademicStandard\Models\AcademicStandard;

class AcademicStandardSeeder extends Seeder
{
    public function run(): void
    {
        AcademicStandard::create(['name' => 'Sample AcademicStandard']);

        // Uncomment to use factory if available
        // AcademicStandard::factory()->count(10)->create();
    }
}
