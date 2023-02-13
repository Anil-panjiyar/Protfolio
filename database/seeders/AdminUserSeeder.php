<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Super Admin',
            'roleid' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
