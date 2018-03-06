<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            "communiti" => "définition communiti",
            "signup" => "inscription",
            "contact" => "contact",
            "network" => "réseau",
            "other" => "autres",
            "evolution" => "évolution",
            "functionality" => "fonctionnalité",
            "API" => "API",
        ];

        foreach ($array as $i => $val) {
            $categorie = new Categorie();
            $categorie->label = $i;
            $categorie->description = $val;
            $categorie->save();
        }
    }
}