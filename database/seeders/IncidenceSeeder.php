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
            "title"=>"Fallo de la maquina de empanadas",
            "text"=>"La maquina de empanadas a dejado de funcionar, paralizando casi por completo la elaboracion de las mismas.",
            "estimatedtime"=> "100",
            "user_id" => "2",
            "category_id" => "2",
            "department_id" => "2",
            "priority_id" => "4",
            "status_id" => "1",
            "created_at"=> now(),
        ]);
        DB::table('incidences')->insert([
            "title"=>"Venta de productos en mal estado de la web",
            "text"=>"Llegan reclamaciones de los usuarios que compraron la ultima linea de empanadas publicada en la web.",
            "estimatedtime"=> "456",
            "user_id" => "1",
            "category_id" => "1",
            "department_id" => "1",
            "priority_id" => "1",
            "status_id" => "6",
            "created_at"=> now(),
        ]);
        DB::table('incidences')->insert([
            "title"=>"Fallo en la base de datos de la web, los precios aparecen con descuento",
            "text"=>"Varios clientes ya han realizado las compras y nos llegan las alertas desde el departamento de ventas.",
            "estimatedtime"=> "100",
            "user_id" => "1",
            "category_id" => "3",
            "department_id" => "3",
            "priority_id" => "4",
            "status_id" => "5",
            "created_at"=> now(),
        ]);
    }
}