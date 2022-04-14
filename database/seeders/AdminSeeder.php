<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM admins");
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@divinelookbd.com',
            'password' => bcrypt('11'),
        ]);
    }
}
