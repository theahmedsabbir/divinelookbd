<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
