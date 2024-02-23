<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroDeCusto;
use App\Models\Responsavel;
use App\Models\Equipamento;


class CentroDeCustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $centro_de_custo = CentroDeCusto::all();
        return view('admin.centros_de_custo.index', compact('centro_de_custo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $responsaveis = Responsavel::orderBy('id', 'desc')->get();
        return view('admin.centros_de_custo.create', compact('responsaveis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'codigo' => 'required|integer',
            'select_resp' => 'required',
            
            
        ], [], [
         'nome' => '"Nome"',   
        'codigo' => '"Codigo"',
        'select_resp' => 'Responsável',
    ]);


        $centro_custo = CentroDeCusto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'responsavel_id' => $request->select_resp
        ]);
        return redirect()->route('admin.centros-de-custo.index')->with('info','Centro de custo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro_de_custo = CentroDeCusto::find($id);
        return view('admin.centros_de_custo.show', compact('centro_de_custo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsaveis = Responsavel::orderBy('id', 'desc')->get();
        $centro_de_custo = CentroDeCusto::find($id);
        return view('admin.centros_de_custo.edit', compact('centro_de_custo', 'responsaveis'));
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
            'nome' => 'required',
            'codigo' => 'required|integer',
            'select_resp' => 'required',
            
            
        ], [], [
         'nome' => '"Nome"',   
        'codigo' => '"Codigo"',
        'select_resp' => 'Responsável',
    ]);

        $centro_de_custo = CentroDeCusto::find($id);
        $centro_de_custo->nome = $request->nome;
        $centro_de_custo->responsavel_id = $request->select_resp;
        $centro_de_custo->codigo = $request->codigo;
        $centro_de_custo->save();
        return redirect()->route('centros-de-custo.index')->with('success','Centro de custo alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro_de_custo = CentroDeCusto::find($id);
        $equipamento = Equipamento::where('centro_de_custo_id', $centro_de_custo->id )->get();
        
        if ($equipamento->count() == 0) {
            $centro_de_custo->delete();

            return redirect()->route('admin.centros-de-custo.index')->with('success', 'Centro de custo excluído com sucesso!');
        }
        return redirect()->route('admin.centros-de-custo.index')->with('error', 'Centro de custo não pode ser apagado, pois está registrado em um equipamento.'); 
    }
}