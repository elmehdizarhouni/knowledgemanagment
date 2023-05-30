<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluateur>
 */
class EvaluateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_evaluateur"=>$this->faker->lastName(),
            "prenom_evaluateur"=>$this->faker->firstName(),
            "adresse_evaluateur"=>$this->faker->address(),
            "email_evaluateur"=>$this->faker->email(),
            "tel_evaluateur"=>$this->faker->phoneNumber,
        ];
    }
}
