<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

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
                'password' => bcrypt('admin'),
                'created_at' => now()
        ]);
        
        User::factory()->has(Post::factory()->count(5)->hasComments(3))->count(20)->create();
    }
}