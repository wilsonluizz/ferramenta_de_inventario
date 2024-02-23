<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Movimentacao;
use App\Models\TipoMovimentacao;
use App\Models\Responsavel;


class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_equipamento)
    {
    
        $movimentos = Movimentacao::orderBy('id', 'desc')->get();
       return view('movimentacoes.index', compact('movimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_equipamento)
    {
        $equipamento = Equipamento::find($id_equipamento); 
        $tipo_mov = TipoMovimentacao::orderBy('id')->get();
        $responsaveis = Responsavel::orderBy('id', 'desc')->get();
        return view('movimentacoes.create', compact('equipamento', 'tipo_mov', 'responsaveis'));
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
            'select_equip' => 'required',
            'select_tipo_mov' => 'required',
            'motivo' => 'required',
            
            
        ], [], [
         'select_equip' => '"Equipamento"',   
        'select_tipo_mov' => '"Tipo de movimentação"',
        'motivo' => '"Motivo"',
        ]);

        Movimentacao::create([
            'motivo_movimentacao' => $request->motivo,
            'responsavel_id' => \Auth::user()->id,
            'equipamento_id' => $request->select_equip,
            'tipo_mov_id' => $request->select_tipo_mov
        ]);

        return redirect()->route('equipamentos.show',$request->select_equip)->with('success','Movimentação registrada com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('historicos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
