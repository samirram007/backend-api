<?php

namespace App\Modules\Document\DocumentMetaData\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Document\DocumentMetaData\Models\DocumentMetaData;

class DocumentMetaDataSeeder extends Seeder
{
    public function run(): void
    {
        DocumentMetaData::create(['name' => 'Sample DocumentMetaData']);

        // Uncomment to use factory if available
        // DocumentMetaData::factory()->count(10)->create();
    }
}
