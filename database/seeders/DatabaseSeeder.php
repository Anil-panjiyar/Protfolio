<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Super Admin',
            'roleid' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\Role::create([
            'role' => 'admin',
            'status' => 'Y'
        ]);

        \App\Models\Role::create([
            'role' => 'company',
            'status' => 'Y'
        ]);
    }
}
