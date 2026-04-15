<?php

namespace App\Modules\Nurses\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Nurses\Models\Nurses;

class NursesSeeder extends Seeder
{
    public function run(): void
    {
        Nurses::create(['name' => 'Sample Nurses']);

        // Uncomment to use factory if available
        // Nurses::factory()->count(10)->create();
    }
}
