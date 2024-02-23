<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Models\Localidade;
use App\Models\CentroDeCusto;
use App\Models\NotaFiscal;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\HistoricoEquipamento;
use App\Models\Movimentacao;
use App\Models\Tipo;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        
    {   
        $tipos = Tipo::orderBy('id', 'desc')->get();
        $historicos = Movimentacao::orderBy('id', 'desc')->get();
        $marcas = Marca::orderBy('id', 'desc')->get();
        $centro_de_custo = CentroDeCusto::orderBy('id', 'desc')->get();
        $nota_fiscal = NotaFiscal::orderBy('id', 'desc')->get();
        $categorias = Categoria::orderBy('id', 'desc')->get();
        return view('equipamentos.create', compact('marcas', 'centro_de_custo', 'tipos', 'nota_fiscal', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
            // dd($request->all());

            $request->validate([
                'titulo' => 'required',
                'select_tipo' => 'required',
                'select_marca' => 'required',
                'descricao' => 'required',
                'valor_equipamento' => 'required',
                'numero_serie' => 'required',
                'select_cc' => 'required',
                
            ], [], [
            'titulo' => '"Nome"',   
            'select_tipo' => '"Tipo"',
            'select_marca' => '"Marca"',
            'numero_serie' => '"Numero de série"',
            'select_cc' => '"Centro de custo"',
            'valor_equipamento' => '"Valor"',
            'select_nota_fiscal' => '"Numero de nota fiscal"']);

            

            $equipamento = Equipamento::create([
            'titulo' => ucwords($request->titulo),
            'tipo_id' => $request->select_tipo,
            'marca_id' => $request->select_marca,
            'descricao' => ucfirst($request->descricao),
            'numero_serie' => $request->numero_serie,
            'centro_de_custo_id' => $request->select_cc,
            'valor_equipamento' => $request->valor_equipamento,
            'nota_fiscal_id' => $request->select_nota_fiscal,
            'patrimonio' => $request->patrimonio
        ]);

            $historico = HistoricoEquipamento::create([
                'atividade_id' => 1,
                'equipamento_id' => $equipamento->id,
                'responsavel_id' => \Auth::user()->id


            ]);  

        return redirect()->route('equipamentos.index',)->with('success','Equipamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $equip = Equipamento::with('movimentacao')->find($id);
        return view('equipamentos.show', compact('equip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $equip = Equipamento::find($id);
        $tipos = Tipo::orderBy('id', 'desc')->get();
        $historicos = Movimentacao::orderBy('id', 'desc')->get();
        $marcas = Marca::orderBy('id', 'desc')->get();
        $centro_de_custo = CentroDeCusto::orderBy('id', 'desc')->get();
        $notafiscal = NotaFiscal::orderBy('id', 'desc')->get();
        $categorias = Categoria::orderBy('id', 'desc')->get();

        return view('equipamentos.edit', compact('equip', 'marcas', 'centro_de_custo', 'notafiscal', 'categorias', 'tipos'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'select_tipo' => 'required',
            'select_marca' => 'required',
            'descricao' => 'required',
            'valor_equipamento' => 'required',
            'numero_serie' => 'required',
            'select_cc' => 'required',
            
        ], [], [
        'titulo' => '"Nome"',   
        'select_tipo' => '"Tipo"',
        'select_marca' => '"Marca"',
        'numero_serie' => '"Numero de série"',
        'select_cc' => '"Centro de custo"',
        'valor_equipamento' => '"Valor"',
        ]);

        $equipamento = Equipamento::find($id);
        $equipamento ->titulo = ucwords($request->titulo);
        $equipamento ->tipo_id = $request->select_tipo;
        $equipamento ->marca_id = $request->select_marca;
        $equipamento ->descricao = ucfirst($request->descricao);
        $equipamento ->valor_equipamento = $request->valor_equipamento;
        $equipamento ->numero_serie = $request->numero_serie;
        $equipamento ->centro_de_custo_id = $request->select_cc;
        $equipamento ->nota_fiscal_id = $request->select_nota_fiscal;
        $equipamento ->patrimonio = $request->patrimonio;
        $equipamento->save();

        $historico = HistoricoEquipamento::create([
            'atividade_id' => 2,
            'equipamento_id' => $equipamento->id,
            'responsavel_id' => \Auth::user()->id


        ]);

        return redirect()->route('equipamentos.index')->with('info', 'Equipamento Editado com sucesso!');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipamento::find($id)->delete();
        return redirect()->route('equipamentos.index')->with('info', 'Equipamento excluído com sucesso!');

        $historico = HistoricoEquipamento::create([
            'atividade_id' => 3,
            'equipamento_id' => $id,
            'responsavel_id' => \Auth::user()->id


        ]);
    }
}

