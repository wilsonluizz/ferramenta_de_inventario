<?php

namespace Database\Seeders;

use App\Models\UnidadeFederativa;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeFederativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadeFederativa::insert([
            ['titulo' => 'Acre', 'uf' => 'AC'],
            ['titulo' => 'Alagoas', 'uf' => 'AL'],
            ['titulo' => 'Amapá', 'uf' => 'AP'],
            ['titulo' => 'Amazonas', 'uf' => 'AM'],
            ['titulo' => 'Bahia', 'uf' => 'BA'],
            ['titulo' => 'Ceará', 'uf' => 'CE'],
            ['titulo' => 'Distrito Federal', 'uf' => 'DF'],
            ['titulo' => 'Espírito Santo', 'uf' => 'ES'],
            ['titulo' => 'Goiás', 'uf' => 'GO'],
            ['titulo' => 'Maranhão', 'uf' => 'MA'],
            ['titulo' => 'Mato Grosso', 'uf' => 'MT'],
            ['titulo' => 'Mato Grosso do Sul', 'uf' => 'MS'],
            ['titulo' => 'Minas Gerais', 'uf' => 'MG'],
            ['titulo' => 'Pará', 'uf' => 'PA'],
            ['titulo' => 'Paraíba ', 'uf' => 'PB'],
            ['titulo' => 'Paraná', 'uf' => 'PR'],
            ['titulo' => 'Pernambuco', 'uf' => 'PE'],
            ['titulo' => 'Piauí', 'uf' => 'PI'],
            ['titulo' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['titulo' => 'Rio Grande do Norte', 'uf' => 'RN'],
            ['titulo' => 'Rio Grande do Sul ', 'uf' => 'RS'],
            ['titulo' => 'Rondônia', 'uf' => 'RO'],
            ['titulo' => 'Roraima', 'uf' => 'RR'],
            ['titulo' => 'Santa Catarina ', 'uf' => 'SC'],
            ['titulo' => 'São Paulo ', 'uf' => 'SP'],
            ['titulo' => 'Sergipe', 'uf' => 'SE'],
            ['titulo' => 'Tocantins', 'uf' => 'TO'],
        ]);
    }
}
