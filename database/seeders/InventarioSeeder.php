<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Marca;
use App\Models\Tipo;
use App\Models\User;
use App\Models\Categoria;
use App\Models\CentroDeCusto;
use App\Models\LocalidadeTipo;
use App\Models\Equipamento;
use App\Models\Localidade;
use App\Models\Atividade;

// use App\Models\Atividade;
// use App\Models\Responsavel;
// use App\Models\TipoMovimentacao;
// use App\Models\NotaFiscal;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {

        // Deploy das principais marcas utilizadas pela aplicação

        Atividade::create([
            'atividade' => 'Criação',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Atividade::create([
            'atividade' => 'Edição',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Atividade::create([
            'atividade' => 'Exclusão',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Dell',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Samsung',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Lenovo',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Asus',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Apple',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Motorola',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'titulo'          => 'Jabra',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        
        // Deploy das categorias contábeis da aplicação
        Categoria::create([
            'titulo'             => 'Informática e softwares',
            'contabil_conta_id'     => 2,
            'created_at'            => date(now()),
            'updated_at'            => date(now()),
        ]);

        Categoria::create([
            'titulo'             => 'Periféricos',
            'contabil_conta_id'     => 2,
            'created_at'            => date(now()),
            'updated_at'            => date(now()),
        ]);

        Categoria::create([
            'titulo'             => 'Telefonia (Chips)',
            'contabil_conta_id'     => 3,
            'created_at'            => date(now()),
            'updated_at'            => date(now()),
        ]);

        Categoria::create([
            'titulo'             => 'Equipamentos médicos',
            'contabil_conta_id'     => 1,
            'created_at'            => date(now()),
            'updated_at'            => date(now()),
        ]);


        // Deploy dos principais tipos de produto
        Tipo::create([
            'titulo'             => 'Notebook',
            'categoria_id'       => 1,
            'created_at'         => date(now()),
            'updated_at'         => date(now()),
        ]);

        Tipo::create([
            'titulo'             => 'Câmera USB de alta resolução (Webcam)',
            'categoria_id'       => 2,
            'created_at'         => date(now()),
            'updated_at'         => date(now()),
        ]);

        Tipo::create([
            'titulo'             => 'Alto-falante (Speaker)',
            'categoria_id'       => 2,
            'created_at'         => date(now()),
            'updated_at'         => date(now()),
        ]);

        Tipo::create([
            'titulo'             => 'Chip 4G/5G',
            'categoria_id'       => 3,
            'created_at'         => date(now()),
            'updated_at'         => date(now()),
        ]);

        Tipo::create([
            'titulo'             => 'Aparelho celular',
            'categoria_id'       => 3,
            'created_at'         => date(now()),
            'updated_at'         => date(now()),
        ]);


        // Deploy dos centros de custo do portfolio Digital
        CentroDeCusto::create([
            'titulo'            =>  'Centro de custo1',
            'codigo_sap'        =>  '99999999',
            'codigo_tasy'       =>  '633',
        ]);

        CentroDeCusto::create([
            'titulo'            =>  'Centro de custo2',
            'codigo_sap'        =>  '88888888',
            'codigo_tasy'       =>  '634',
        ]);

        CentroDeCusto::create([
            'titulo'            =>  'Centro de custo3',
            'codigo_sap'        =>  '77777777',
            'codigo_tasy'       =>  '654',
        ]);
        
        CentroDeCusto::create([
            'titulo'            =>  'Centro de custo4',
            'codigo_sap'        =>  '66666666',
            'codigo_tasy'       =>  '11055',
        ]);

        LocalidadeTipo::create([
            'titulo'            =>  'Residência de colaborador',
        ]);

        LocalidadeTipo::create([
            'titulo'            =>  'Unidade Núcleo-SP',
        ]);


        LocalidadeTipo::create([
            'titulo'            =>  'Unidade Núcleo-MG',
        ]);


        // CRIA O PERFIL DE CLIENTE 
        $cliente = Role::create([
            'name'          => 'Cliente',
            'description'   => 'Perfil de usuário cliente da aplicação, possui somente permissão de uso',
        ]);

        // Cria permissão de cliente
        Permission::create([
            'name'          => 'cliente',
            'description'   => 'Permissão de cliente do sistema',
        ]);

        $cliente->syncPermissions([
            'cliente',
        ]);

        // CRIA PERFIL DE RESPONSÁVEL PELO ESTOQUE
        $adm_estoque = Role::create([
            'name'          => 'Administrador de estoque',
            'description'   => 'Perfil responsável por administrar o estoque de um centro de custo',
        ]);
        
        Permission::create([
            'name'          => 'emprestar-equipamento',
            'description'   => 'Permissão para emprestar equipamentos',
        ]);

        $adm_estoque->syncPermissions([
            'emprestar-equipamento',
        ]);

        // ASSOCIA AS REGRAS CRIADAS AO USUÁRIO ROOT
        $root = User::find(1);
        $root->assignRole([$cliente, $adm_estoque]);

        // Associa todos os centros de custo ao root
        $root->centrosDeCustos()->attach(CentroDeCusto::all());



        // CRIA USUÁRIOS E PERMISSÕES
        // FIXME: REMOVER DE PRODUÇÃO TODAS AS LINHAS ABAIXO!!!
        $u1 = User::create([
            'name'          => 'Wilson Luiz',
            'email'         => 'wilsonluiz31051991@gmail.com',
            'password'      => Hash::make('mikesantana5'),
           
        ]);

        $u2 = User::create([
            'name'          => 'Renato Augusto',
            'email'         => 'renatoaugusto.corinthians.com.br',
            'password'      => Hash::make('@'),
          
        ]);

        $u3 = User::create([
            'name'          => 'Fabio Santos',
            'email'         => 'fabiosantos.corinthians.com.br',
            'password'      => Hash::make('@'),
        ]);
        

        // TRANSFORMA O USUARIO 1 EM ADMINISTRADOR DA APLICAÇÃO
        $admin = Role::find(1);
        $u1->assignRole([$admin]);
        
        // TRANSFORMA O USUARIO 2 EM CLIENTE
        $u2->assignRole([$cliente]);
        
        // TRANSFORMA O USUARIO 3 EM ADMINISTRADOR DO ESTOQUE
        $u3->assignRole([$adm_estoque]);
        

        // Associa o centro de custos 'TeleUTI' (id 1) ao usuário 'Bruno'
        $u3->centrosDeCustos()->attach([1]);

        Equipamento::factory(216)->create();
        Localidade::factory(122)->create();
    }
}

