<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Atlet;
use Database\Factories\GowaFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // DummyGolongansSeeder::class,
            // DummyKelasTandingsSeeder::class,
            // DummyKontingensSeeder::class,
            // DummySenisSeeder::class,
            DummyUsersSeeder::class,
            // DummyInvoicesSeeder::class
        ]);

        // Atlet::factory(20)->create();
        
    }
}
