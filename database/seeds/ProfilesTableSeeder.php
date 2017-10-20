<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Administrador',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('profiles')->insert([
            'name' => 'Usuario',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
