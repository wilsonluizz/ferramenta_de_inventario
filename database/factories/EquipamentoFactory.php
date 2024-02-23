<?php

namespace Database\Factories;

use App\Models\Equipamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipamento>
 */
class EquipamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Equipamento::class;

    public function definition()
    {
        return [
            'titulo'                => $this->faker->word(),
            'descricao'             => $this->faker->text(),
            'valor_equipamento'     => $this->faker->numberBetween(1000, 9999),
            'numero_serie'          => Str::random(5),
            'patrimonio'            => null,
            'centro_de_custo_id'    => $this->faker->numberBetween(1, 4),
            'tipo_id'               => $this->faker->numberBetween(1, 5),
            'marca_id'              => $this->faker->numberBetween(1, 7),
            'nota_fiscal_id'        => null,
            'created_at'            => now(),
            'updated_at'            => now(),
            'deleted_at'            => null,
        ];
    }
}
