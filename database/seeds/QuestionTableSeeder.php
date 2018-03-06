<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            "Qu'est ce que communiti" => 1,
            "Comment fonctionne communiti" => 1,
            "Qui peut s'inscrire sur communiti" => 2,
            "Comment rejoindre le réseau" => 2,
            "Quand et comment l'idée de créer communiti est-elle née" => 1,
            "Quelles sont les particularités de ce réseau" => 4,
            "Quelles ont été les récentes évolutions de communiti" => 6,
            "Quels sont vos projets pour Communiti" => 6,
            "Y-a-t-il une application mobile pour Communiti" =>NULL,
            "Qui sont les créateurs de Communiti" =>NULL ,
            "Quelle est la vocation de Communiti" =>NULL ,
            "En tant qu'étudiant, que peut m'apporter ce réseau" => NULL,
            "En tant que membre de la Diaspora, que peut m'apporter ce réseau" => 3,
            "Comment pouvons nous contacter l'équipe de Communiti" => 3,
            "Avez-vous une page Facebook" => 3,
            "Avez-vous un compte Twitter" => 3,
            "Avez-vous une page LinkedIn" => 3,
            "Organisez-vous des évènements" => NULL,
            "Quels sont vos partenaires" =>NULL ,
            "Comment en savoir plus au sujet du réseau" => 4,
            "Etes-vous un robot" => 5,
            "Comment vous appelez vous" => 5,
            "Comment cela fonctionne-t-il" => 7,
            "Comment fonctionne l'inscription" => 7,
            "Comment allez-vous" => 5,
            "Excellent !" => 5,
            "Est-il possible d'envoyer des messages aux autres membres du réseau" => 7,
            "Quelle est la liste de tous les membres corse" => 8,
            "Où y a-t-il le plus de corse" => 8,
            "Quels sont les projets ajoutés depuis {date}" => 8,
            "Où y a-t-il le plus de création de projet" => 8,
            "Est-ce que monsieur {user} est sur communiti" => 8,
            "Où en est l’avancement du projet {projet}" => 8,
            "Qu’elles sont les projets qui a besoin de financement" => 8,
            "Qu’elles sont les projets qui sont dans ma région" => 8,
            "Qu’elles sont les projets avec le thème {theme}" => 8,
            "Qui sont les corses de ma région" => 8,
            "Qu’elle est le premier projet fini" => 8,
            "Qu’elle est le dernier projet mener à bien" => 8,
            "Qu’elle est le projet le plus récent" => 8,
        ];

        foreach ($array as $i => $val) {
            $question = new Question();
            $question->text = $i;
            $question->categorie_id = $val;
            $question->save();
        }
    }
}