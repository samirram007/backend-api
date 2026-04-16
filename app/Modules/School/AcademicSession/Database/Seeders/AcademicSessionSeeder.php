<?php

namespace App\Modules\School\AcademicSession\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\AcademicSession\Models\AcademicSession;

class AcademicSessionSeeder extends Seeder
{
    public function run(): void
    {
        AcademicSession::create(['name' => 'Sample AcademicSession']);

        // Uncomment to use factory if available
        // AcademicSession::factory()->count(10)->create();
    }
}
