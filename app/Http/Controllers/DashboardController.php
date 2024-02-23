<?php

namespace App\Http\Controllers;

use App\Models\CentroDeCusto;
use App\Models\Localidade;
use App\Models\Equipamento;
use App\Models\Tipo;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }

    // Busca os dados para utilizar nos gráficos do dashboard. Por enquanto, sem filtrar nada
    public function getData() {


        // Informações sobre os centros de custos
        $centrosDeCusto = CentroDeCusto::orderBy('id', 'DESC')->get(['id','titulo']);

        $data['equipamentos'] = 0;

        foreach($centrosDeCusto as $cc) {
            $e = Equipamento::where('centro_de_custo_id', '=', $cc['id'])->count();
            $data['centrosDeCusto']['titulo'][] = $cc['titulo'];
            $data['centrosDeCusto']['n'][] = $e;

            $data['equipamentos'] += $e;
        }

        $tipos = Tipo::orderBy('id', 'DESC')->get(['id','titulo']);
        foreach($tipos as $t) {
            $data['tipo']['titulo'][] = $t['titulo'];
            $data['tipo']['n'][] = Equipamento::where('tipo_id', '=', $t['id'])->count();
        }

        // Não a condicional WHERE oculta os endereços residenciais
        $localidades = Localidade::where('localidade_tipo_id', '!=', 1)->orderBy('created_at', 'DESC')->get(['titulo', 'latitude', 'longitude']);
        foreach($localidades as $l) {
            $data['local']['titulo'][] = $l['titulo'];
            $data['local']['lat'][] = $l['latitude'];
            $data['local']['lon'][] = $l['longitude'];
        }

        return $data;
    }
}
