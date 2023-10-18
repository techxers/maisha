<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::where('email', 'admin@gmail.com')->first();
        if (!$adminUser) {
            User::create([
                'email' => 'admin@gmail.com',
                'phone' => '0712345678',
                'name' => 'Super Admin',
                'role_id' => 0,
                'user_type' => 0,
                'status' => 'active',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
