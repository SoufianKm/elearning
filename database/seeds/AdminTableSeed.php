<?php

use Illuminate\Database\Seeder;

class AdminTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
        	'name' => str_random(10),
        	'prenom' => str_random(10),
        	'cin' => str_random(8),
        	'adresse' => str_random(40),
        	'tel' => str_random(10),
        	'photo' => str_random(100),
        	'id_user' => str_random(2)
        	]);
    }
}
