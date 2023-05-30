<?php

namespace Database\Factories;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    protected $model=Employe::class;
    public function definition(): array
    {
        return [
            "nom"=>$this->faker->lastName(),
            "prenom"=>$this->faker->firstName(),
            "adresse"=>$this->faker->address(),
            "email"=>$this->faker->email(),
            "telephone"=>$this->faker->phoneNumber,
            "date_embauche"=>$this->faker->date,
            "id_poste"=>$this->faker->randomNumber(1,12),
        ];
    }
}
