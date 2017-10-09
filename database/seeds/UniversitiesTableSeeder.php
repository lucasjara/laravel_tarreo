<?php

use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'name' => 'Universidad Tecnologica de Chile INACAP',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad de la Frontera UFRO',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Catolica de Temuco',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Mayor',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Autonoma de Chile',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Santo Tomas',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Arturo Prat',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad la Republica',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad de Aconcagua',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad Diego Portales',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad del Mar',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Universidad de los Lagos',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('universities')->insert([
            'name' => 'Ninguna',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
