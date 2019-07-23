<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@test.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
