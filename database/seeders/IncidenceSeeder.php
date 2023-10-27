<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class IncidenceSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('incidences')->insert([
            "title"=>"Primer comentario",
            "text"=>"1",
            "estimatedtime"=> "100",
            "user_id" => "1",
            "category_id" => "1",
            "department_id" => "1",
            "priority_id" => "1",
            "created_at"=> now(),
        ]);
        DB::table('incidences')->insert([
            "title"=>"Segundo comentario",
            "text"=>"2",
            "estimatedtime"=> "100",
            "user_id" => "1",
            "category_id" => "2",
            "department_id" => "2",
            "priority_id" => "2",
            "created_at"=> now(),
        ]);
        DB::table('incidences')->insert([
            "title"=>"Tercer comentario",
            "text"=>"3",
            "estimatedtime"=> "100",
            "user_id" => "1",
            "category_id" => "3",
            "department_id" => "3",
            "priority_id" => "3",
            "created_at"=> now(),
        ]);
    }
}