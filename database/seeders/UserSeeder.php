<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                //"identifiant_user" => "",
                "nom" => "Harold",
                "prenom" => "Adjahi",
                "pseudo" => "HaroldMed",
                "password" => '$2a$12$EBAd.4BUoZD3CrAGYF6gmeMWSyWYxe2jTpQBDAd7BGtxJLZnkCVDK',
                "role" => "Responsable technicien",
            ]
        ]);
    }
}
