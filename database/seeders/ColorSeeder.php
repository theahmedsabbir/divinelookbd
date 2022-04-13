<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        DB::statement("DELETE FROM colors");
        DB::table('colors')->insert([
            [
            	'id' => 1,
            	'name' => 'Black',
            ],
            [
            	'id' => 2,
            	'name' => 'Blue',
            ],
            [
            	'id' => 3,
            	'name' => 'Yellow',
            ],
            [
            	'id' => 4,
            	'name' => 'Green',
            ],
            [
            	'id' => 5,
            	'name' => 'Pink',
            ],
            [
            	'id' => 6,
            	'name' => 'Orange',
            ],
            [
            	'id' => 7,
            	'name' => 'Red',
            ],
            [
            	'id' => 8,
            	'name' => 'Violet',
            ],
        ]);
    }
}
