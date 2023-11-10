<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ComentarioSeeder extends Seeder {
    public function run(): void {
        DB::table('comentarios')->insert([
            "texto"=>"Prueba a reiniciar la maquina, si después de eso la luz está en rojo, llama a servicio técnico.",
            "user_id" =>"1",
            "incidence_id"=>"1",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Prueba a retroceder el último guardado de la base de datos.",
            "user_id" =>"1",
            "incidence_id"=>"3",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Prueba a restaurar la base de datos utilizando la backup de la semana pasada.",
            "user_id" =>"2",
            "incidence_id"=>"3",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Hablar con los proveedores asociados a la nueva línea del producto.",
            "user_id" =>"1",
            "incidence_id"=>"2",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Llamar al técnico de la empresa de la máquina.",
            "user_id" =>"3",
            "incidence_id"=>"1",
            "created_at"=>now(),
        ]);
        DB::table('comentarios')->insert([
            "texto"=>"Bloquea el producto de la web y ofrece el servicio de devoluciones a los afectados.",
            "user_id" =>"2",
            "incidence_id"=>"2",
            "created_at"=>now(),
        ]);
    }
}
