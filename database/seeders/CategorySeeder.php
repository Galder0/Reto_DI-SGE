<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            "name"=>"categoria4",
            "created_at"=>now(),
        ]);
        DB::table('categories')->insert([
            "name"=>"categoria1",
            "created_at"=>now(),
        ]);
        DB::table('categories')->insert([
            "name"=>"categoria2",
            "created_at"=>now(),
        ]);
    }
}
