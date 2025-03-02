<?php

namespace Database\Seeders;

use App\Models\Stagiaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class StagiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Stagiaire::create([

        //    'nom' => fake()->lastName(50),
        //    'prenom' => fake()->firstName(50),
        //    'age' => fake()->numberBetween(17, 30),
        //    'email' => fake()->unique()->safeEmail(),
        //    'password' => bcrypt(rand())

        //]);

        Stagiaire::factory()->count(25)->create();

    }
}
