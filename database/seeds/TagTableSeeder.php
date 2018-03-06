<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            "communiti",
            "fonctionne",
            "fonctionnalité",
            "fonctionnement",
            "qui",
            "inscrire",
            "rejoindre",
            "idée",
            "née",
            "particularités",
            "réseau",
            "avantage",
            "inconvénient",
            "évolution",
            "news",
            "nouveauté",
            "projets",
            "mobile",
            "application",
            "téléphone",
            "portable",
            "android",
            "apple",
            "ios",
            "créateur",
            "crée",
            "fondateur",
            "vocation",
            "but",
            "étudiant",
            "apporter",
            "corse",
            "diaspora",
            "peuple",
            "contact",
            "contacter",
            "facebook",
            "twitter",
            "linkedin",
            "évènements",
            "évènement",
            "event",
            "partenaire",
            "partenaires",
            "savoir",
            "plus",
            "encore",
            "robot",
            "es-tu",
            "es",
            "tu",
            "nom",
            "appelle",
            "prénom",
            "appelez",
            "fonctionne",
            "fonctionnement",
            "fonction",
            "ça-va",
            "excellent",
            "génial",
            "bien",
        ];

        foreach ($array as $value) {
            $tag = new Tag();
            $tag->label = $value;
            $tag->save();
        }
    }
}