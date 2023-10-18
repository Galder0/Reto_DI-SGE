<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PostSeeder extends Seeder {
    public function run(): void {
        DB::table('posts')->insert([
            "titulo"=>"Primer post",
            "texto"=>"Este es el texto del primer post",
            "publicado"=>true,
            "created_at"=>now(),
        ]);
    }
}


