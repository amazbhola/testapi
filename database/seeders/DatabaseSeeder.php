<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Location;
use App\Models\Tender;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'Sohel',
            'email' => 'sohel@sohel.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->call(RolePermissionSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(UpazilaSeeder::class);
        Department::factory(10)->create();
        Tender::factory(10)->create();
    }
}
