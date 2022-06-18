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
        User::create([
            'name' => 'Admin Sistem SPK',
            'email' => 'mirwansyah@uin.suska.ac.id',
            'email_verified_at' => date('Y-m-d'),
            'password' => Hash::make('admin.test'),
        ]);
    }
}
