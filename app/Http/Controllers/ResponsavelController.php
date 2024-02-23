<?php

namespace App\Http\Controllers;

use App\Models\CentroDeCusto;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsaveis = Responsavel::orderBy('created_at', 'desc')->paginate(10);
        return view('responsaveis.index', compact('responsaveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsaveis.create');
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
            'nome' => 'required|string',
            'rg' => 'required|string',
            'cpf' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
        ], [],[
            'nome' => 'Nome',
            'cpf' => 'Matricula',
            'rg' => 'Matricula',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
        ]);

        $cpf = $request->cpf;
        $rg = $request->rg;

        $responsavel = Responsavel::create([
            'id' =>  Str::uuid()->toString(),
            'nome' => ucwords($request->nome),
            'cpf' => Crypt::encryptString($cpf),
            'rg' => Crypt::encryptString($rg),
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        return redirect()->route('responsaveis.index')->with('success','Responsável criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $responsavel = Responsavel::find($id);
        return view('responsaveis.show', compact('responsavel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsavel = Responsavel::find($id);
        return view('responsaveis.edit', compact('responsavel'));
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
            'nome' => 'required|string',
            'matricula' => 'required|integer',
            'email' => 'required|email',
        ], [],[
            'nome' => 'Nome',
            'matricula' => 'Matricula',
            'email' => 'E-mail',
        ]);

        $responsavel = Responsavel::find($id);

        $responsavel->nome = $request->nome;
        $responsavel->matricula = $request->matricula;
        $responsavel->email = $request->email;
        $responsavel->save();
        return redirect()->route('responsaveis.index')->with('info', 'Responsável alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsavel = Responsavel::find($id);
        $centro_custo = CentroDeCusto::where('responsavel_id', $responsavel->id)->get();

        if ($centro_custo->count() == 0) {
            $responsavel->delete();
            return redirect()->route('responsaveis.index')->with('success', 'Responsável excluído com sucesso!');
        }
        return redirect()->route('responsaveis.index')->with('error', 'Responsável não pode ser excluído, pois está em uso no sistema');

        
        
    }
}
