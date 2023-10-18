<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder {
    public function run(): void {
        DB::table('comentarios')->insert([
            "texto"=>"Primer comentario",
            "post_id"=>"1",
            "created_at"=>now(),
        ]);
    }
}
