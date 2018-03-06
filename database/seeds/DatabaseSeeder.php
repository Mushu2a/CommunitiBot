<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Categorie seeder.
        $this->call(CategorieTableSeeder::class);
        
        // Question seeder.
        $this->call(QuestionTableSeeder::class);

        // Answer seeder.
        $this->call(AnswerTableSeeder::class);

        // Tag seeder.
        $this->call(TagTableSeeder::class);

        // HeHas seeder.
        $this->call(HeHasTableSeeder::class);
    }
}
