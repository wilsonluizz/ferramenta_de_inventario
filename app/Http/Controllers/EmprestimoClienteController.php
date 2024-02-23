<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipamentoGenerico;
use App\Models\SolicitacaoEmprestimo;
use App\Models\User;


class EmprestimoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos_genericos = EquipamentoGenerico::all();
        $solicitacoes = SolicitacaoEmprestimo::all();
        return view('emprestimo_client.index', compact('equipamentos_genericos','solicitacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipamentos = $request['equipamentos_solicitados'];
        foreach ($equipamentos as $equipamento) {
            SolicitacaoEmprestimo::create([
                'client_solicitante_id' => \Auth::user()->id,
                'equipamento_gen_id' => $equipamento,
                'status_id' => 3,
            ]);
        }

        return redirect()->route('emprestimos.index',)->with('success','Solicitação enviada com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
