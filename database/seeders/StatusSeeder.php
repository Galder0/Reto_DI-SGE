<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'name' => 'status 1',
        ]);
        DB::table('statuses')->insert([
            'name' => 'status 2',
        ]);
        DB::table('statuses')->insert([
            'name' => 'status 3',
        ]);
        DB::table('statuses')->insert([
            'name' => 'status 4',
        ]);

    }
}
