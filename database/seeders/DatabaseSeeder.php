<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Miqotilla',
            'email' => 'miqotilla@gmail.com',
            'password' => 'quesadilla',
        ]);

        $this->call(AutorSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(LibroSeeder::class);
    }
}
