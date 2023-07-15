<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Utility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'username' => 'ZumaAkbarID',
            'email' => 'admin@gmail.com',
            'first_name' => 'Admin',
            'last_name' => 'Ganteng',
            'password' => config('password.salt_front') . 'password' . config('password.salt_back'),
        ]);

        Utility::factory()->create([
            'u_key' => 'app_name',
            'u_value' => 'Ungu.In Clone'
        ]);

        Utility::factory()->create([
            'u_key' => 'description',
            'u_value' => 'Pastikan alamat website kamu dikemas secara aesthetic dengan bantuan ungu.in tanpa bikin jari keriting dan perut pusing.'
        ]);

        Utility::factory()->create([
            'u_key' => 'keywords',
            'u_value' => 'unguin, shortenlink, pemendeklink, ungu.in'
        ]);

        Utility::factory()->create([
            'u_key' => 'author',
            'u_value' => 'ORIGINAL OSORA. CLONE ZUMA'
        ]);
    }
}
