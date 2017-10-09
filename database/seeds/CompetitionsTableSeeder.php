<?php

use Illuminate\Database\Seeder;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  Listado de Juegos
         */
        DB::table('competitions')->insert([
            'name' => 'Cod 4',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Medal of Honor Allied Asault',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Cod 6',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'CS 1.6',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Hearstone',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Rocket League',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Halo',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Quake 3',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Pes 2017',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'CS Source',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Mortal Kombat IX',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Dinosaurio de Google',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Gang Beasts',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Entrenamiento de Cod 4',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Guitar Hero 3',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Smash Bross Wii U',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Mario Kart Nintendo Switch',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Guilty Gear PS4',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'The Kings of Fighters PS4',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Naruto Ultimate Ninga Storm 4',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Injust E 2 Xbox One',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Killer Instict',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('competitions')->insert([
            'name' => 'Trivia',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
