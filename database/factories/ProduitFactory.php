<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=> $this->faker->name(),
            'description'=> $this->faker->text(),
            'prix'=> $this->faker->numberBetween(10000000000000000000),
            'user_id'=> $this->faker->numberBetween(1,10),
        ];
    }
}
