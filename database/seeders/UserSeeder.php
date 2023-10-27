<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Galder',
            'email' => 'galder.gonzalez-balsiz@elorrieta-errekamari.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$xgPBhf6KvmRSNHfCRywgduYX2icW.3iR2C4DWkohabNWn38Kv1MlS',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'department_id' => 1,
        ]);
    }
}
