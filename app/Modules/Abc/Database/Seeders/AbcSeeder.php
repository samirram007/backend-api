<?php

namespace App\Modules\Abc\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Abc\Models\Abc;

class AbcSeeder extends Seeder
{
    public function run(): void
    {
        Abc::create(['name' => 'Sample Abc']);

        // Uncomment to use factory if available
        // Abc::factory()->count(10)->create();
    }
}
