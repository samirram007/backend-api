<?php

namespace App\Modules\Document\DocumentFolder\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\DocumentFolder\Models\DocumentFolder;

class DocumentFolderSeeder extends Seeder
{
    public function run(): void
    {
        DocumentFolder::create(['name' => 'Sample DocumentFolder']);

        // Uncomment to use factory if available
        // DocumentFolder::factory()->count(10)->create();
    }
}
