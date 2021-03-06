<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Carlos Holguin',
            'email' => 'caholguin1798@gmail.com',
            'password' => bcrypt('1000883640')
        ])/*agregar rol*/ ->assignRole('Admin');

        User::factory(99)->create();
    }
}
