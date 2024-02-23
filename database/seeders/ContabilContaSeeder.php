<?php

namespace Database\Seeders;

use App\Models\ContabilConta;
use Illuminate\Database\Seeder;

class ContabilContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContabilConta::create([
            'codigo_sap'    =>  '84000006',
            'codigo_tasy'   =>  '40423',
            'alias'         =>  'Equipamentos e Materiais Projetos 1',
        ]);

        ContabilConta::create([
            'codigo_sap'    =>  '84000008',
            'codigo_tasy'   =>  '40425',
            'alias'         =>  'Computadores, Periféricos e Softwares - PROADI',
        ]);

        ContabilConta::create([
            'codigo_sap'    =>  '64000004',
            'codigo_tasy'   =>  '40074',
            'alias'         =>  'Telefone',
        ]);

        
    }
}
