<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Invoice::Factory(30)->create();

        User::factory()->create([
            'first_name' => 'Test User',
            // 'first_name' => 'Test User Test',
            'email' => 'test@example.com',
        ]);
    }
}
