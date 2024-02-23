<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localidade>
 */
class LocalidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'                => $this->faker->word(), 
            'cep'                   => $this->faker->numberBetween(01000000, 99000000),
            'logradouro'              => $this->faker->sentence(), 
            'numero'                => $this->faker->numberBetween(1, 999),
            'complemento'           => null,
            'bairro'                => $this->faker->words(2, true), 
            'cidade'                => $this->faker->words(2, true), 
            'uf'                    => $this->faker->lexify('??'), 
            'latitude'              => $this->faker->numberBetween(-22, -5),
            'longitude'             => $this->faker->numberBetween(-57, -47),
            'localidade_tipo_id'    => $this->faker->numberBetween(1, 4),
            // 'responsavel_id',
        ];
    }
}
