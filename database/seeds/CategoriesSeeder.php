<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'PC',
            'id_competition' => 1,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('categories')->insert([
            'name' => 'CONSOLAS',
            'id_competition' => 6,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('categories')->insert([
            'name' => 'FLASH',
            'id_competition' => 12,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('categories')->insert([
            'name' => 'TRIVIA',
            'id_competition' => 23,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
