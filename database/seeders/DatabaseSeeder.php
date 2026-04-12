<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\AppModule\Database\Seeders\AppModuleSeeder;
use App\Modules\Country\Database\Seeders\CountrySeeder;
use App\Modules\Currency\Database\Seeders\CurrencySeeder;
use App\Modules\Role\Database\Seeders\RoleSeeder;
use App\Modules\State\Database\Seeders\StateSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
                // AppModuleSeeder::class,
            RoleSeeder::class,

                // GstRegistrationTypeSeeder::class,

            CurrencySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            SampleDataSeeder::class,
        ]);
    }
}
