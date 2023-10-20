<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ComentarioSeeder extends Seeder {
    public function run(): void {
        DB::table('comentarios')->insert([
            "texto"=>"Primer comentario",
            "post_id"=>"1",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Segundo comentario",
            "post_id"=>"1",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Tercer comentario",
            "post_id"=>"1",
            "created_at"=>now(),
        ]);
    }
}
