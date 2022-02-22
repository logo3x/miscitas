<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => "Luis Oviedo",
            'email' => "lgoviedo17@hotmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('xxxxxx'), // password  
            'dni' => "102112212",
            'address' => "",            
            'phone' => "3143693735",
            'role' => "admin"
        ]);
        $user = User::factory()->create([
            'name' => "Administrador",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password  
            'dni' => "1111111111",
            'address' => "",            
            'phone' => "3143693735",
            'role' => "admin"
        ]);
        $users = User::factory()->count(100)->create();
        
    }
}
