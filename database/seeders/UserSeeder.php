<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'email' => 'admin@projet.dev',
                'name' => 'admin',
                'password' => bcrypt('admin')
        ]);
        
        User::factory()->count(20)->create();
    }
}
