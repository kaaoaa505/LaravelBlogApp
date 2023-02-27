<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // DB::table('users')->truncate();

        User::factory()->create([
            'name' => 'Author One',
            'email' => 'a1@lo.ho',
        ]);

        User::factory()->create([
            'name' => 'Author Two',
            'email' => 'a2@lo.ho',
        ]);

        User::factory()->create([
            'name' => 'Author Three',
            'email' => 'a3@lo.ho',
        ]);
        
        // User::factory(10)->create();
    }
}
