<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        try {
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Secret123#'),
 
            ]);
            $user = User::create([
                'name' => 'patient',
                'email' => 'Patient@gmail.com',
                'password' => bcrypt('Secret123#'),
 
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
