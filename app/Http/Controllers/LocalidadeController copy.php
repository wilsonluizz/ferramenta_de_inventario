<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidade;
use App\Models\UnidadeFederativa;
use App\Models\Responsavel;
use App\Models\Equipamento;
use App\Models\TipoLocalidade;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class LocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $localidades = Localidade::orderBy('created_at', 'desc')->paginate(10);
        return view('localidades.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $users = User::all();
        $tipo_localidades = TipoLocalidade::all();
        return view('admin.localidades.create', compact('users', 'tipo_localidades'));
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
            'cep' => 'required|numeric',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'numero' => 'required|numeric',
            'titulo' => 'required',
            'responsavel_id' => 'required',
            'tipo_localidade_id' => 'required',



        ], [], [
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'UF',
            'numero' => 'Numero',
            'titulo' => 'Nome',
            'responsavel_id' => 'Responsavel',
            'tipo_localidade_id' => 'Tipo de localidade',
        ]);



        $localidade = Localidade::create([
            'cep' => str_replace('-', '', $request->cep),
            'logradouro' => ucwords($request->logradouro),
            'bairro' => ucwords($request->bairro),
            'cidade' => ucwords($request->cidade),
            'uf' => strtoupper($request->uf),
            'numero' => $request->numero,
            'complemento' => ucwords($request->complemento),
            'titulo' => ucwords($request->nome),
            'responsavel_id' => $request->responsavel_id,
            'tipo_localidade_id' => $request->tipo_localidade_id

        ]);

        return redirect()->route('localidades.index')->with('success', 'Localidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Localidade::find($id);
        return view('localidades.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $local = Localidade::find($id);
        $users = User::all();
        $tipo_localidades = TipoLocalidade::all();
        return view('admin.localidades.create', compact('users', 'tipo_localidades', 'local'));

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
            'cep' => 'required|numeric',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'numero' => 'required|numeric',
            'nome' => 'required',



        ], [], [
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'UF',
            'numero' => 'Numero',
            'nome' => 'Nome',
        ]);

        $local = Localidade::find($id);
        $local->cep = $request->cep;
        $local->logradouro = $request->logradouro;
        $local->bairro = $request->bairro;
        $local->cidade = $request->cidade;
        $local->uf = $request->uf;
        $local->numero = $request->numero;
        $local->nome = $request->nome;
        $local->save();
        return redirect()->route('localidades.index')->with('info', 'Localidade alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $localidade = Localidade::find($id);
        $equipamento = Equipamento::where('localidade_id', $localidade->id)->get();
        if ($equipamento->count() == 0) {
            $localidade->delete();

            return redirect()->route('localidades.index')->with('success', 'Localidade foi excluída com sucesso!');
        }
        return redirect()->route('localidades.index')->with('error', 'Localidade não pode ser excluída, pois está registrada em um equipamento.');
    }
}
