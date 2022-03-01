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
       User::create([
            'name' => 'Carlos Holguin',
            'email' => 'caholguin1798@gmail.com',
            'password' => bcrypt('12345678')
       ]);
    }
}
