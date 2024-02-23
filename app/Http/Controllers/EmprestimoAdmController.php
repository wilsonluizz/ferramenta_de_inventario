<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitacaoEmprestimo;
use App\Models\SolicitacaoStatus;
use App\Models\User;

class EmprestimoAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $solicitacoes = SolicitacaoEmprestimo::orderBy('client_solicitante_id', 'desc')->paginate(10);
        return view('emprestimo_adm.index',compact('solicitacoes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitacao = SolicitacaoEmprestimo::find($id);
        $status = SolicitacaoStatus::all();
        return view('emprestimo_adm.show', compact('solicitacao', 'status'));
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
        $solicitacao = SolicitacaoEmprestimo::find($id);
        $solicitacao->status_id = $request->select_status;
        $solicitacao->save();
        if ($request->select_status == 1) {
            $mensagem = "Solicitação aprovada com sucesso!";
        } 
        else if($request->select_status == 2){
            $mensagem = "Você rejeitou a solicitação";
        }
        return redirect()->route('adm-emprestimos.index')->with('success', $mensagem);
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
