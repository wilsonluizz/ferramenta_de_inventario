<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidade;
use App\Models\LocalidadeTipo;
use App\Models\UnidadeFederativa;
use App\Models\Responsavel;
use App\Models\Equipamento;
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
        $localidades = Localidade::orderBy('created_at', 'desc')->paginate(30);
        return view('localidades.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $localidade_tipos = LocalidadeTipo::all();

        $metodo = 'create';
        $localidade = null;
        return view('localidades.crud', compact(['metodo', 'localidade', 'localidade_tipos']));
        // return view('localidades.crud', compact(['metodo', 'localidade', 'users', 'tipo_localidades']));
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

            'titulo'                => 'required',
            'cep'                   => 'required',
            'logradouro'            => 'required',
            'cidade'                => 'required',
            'uf'                    => 'required',
            'numero'                => 'required',
            'localidade_tipo_id'    => 'required',

        ], [], [
            'titulo'                => 'Identificador (nome)',
            'cep'                   => 'CEP',
            'logradouro'            => 'Endereço',
            'cidade'                => 'Cidade',
            'uf'                    => 'UF',
            'numero'                => 'Número',
            'localidade_tipo_id'    => 'Tipo de localidade',
        ]);

        unset($request["_token"], $request["_method"]);

        $local = new Localidade;
        foreach ($request->all() as $key => $value) {
            $local->$key = $value;
        }

        if($local->save())
            $callback = [
                'message' => 'Localidade registrada com sucesso', 
                'style' =>'primary'
            ];
        else
            $callback = [
                'message' => 'Ocorreu um erro ao criar a localidade',
                'style' =>'danger'
            ];

        return redirect()->route('localidades.index')->with($callback);
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

        $localidade_tipos = LocalidadeTipo::all();
        
        $metodo = 'edit';
        $localidade = Localidade::find($id);
        return view('localidades.crud', compact(['metodo', 'localidade', 'localidade_tipos']));
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

            'titulo'                => 'required',
            'cep'                   => 'required',
            'logradouro'            => 'required',
            'cidade'                => 'required',
            'uf'                    => 'required',
            'numero'                => 'required',
            'localidade_tipo_id'    => 'required',
        ], [], [
            'titulo'                => 'Identificador (nome)',
            'cep'                   => 'CEP',
            'logradouro'            => 'Endereço',
            'cidade'                => 'Cidade',
            'uf'                    => 'UF',
            'numero'                => 'Número',
            'localidade_tipo_id'    => 'Tipo de localidade',
        ]);

        unset($request["_token"], $request["_method"]);

        $local = Localidade::find($id);

        foreach ($request->all() as $key => $value) {
            $local->$key = $value;
        }

        if($local->update())
            $callback = [
                'message' => 'Localidade alterada com sucesso', 
                'style' =>'primary'
            ];
        else
            $callback = [
                'message' => 'Ocorreu um erro ao editar a localidade',
                'style' =>'danger'
            ];

        return redirect()->route('localidades.index')->with($callback);

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
        // $equipamento = Equipamento::where('localidade_id', $localidade->id)->get();
        // if ($equipamento->count() == 0) {
        
            $localidade->delete();

        //     return redirect()->route('localidades.index')->with('success', 'Localidade foi excluída com sucesso!');
        // }

        return redirect()->route('localidades.index')->with('error', 'Localidade não pode ser excluída, pois está registrada em um equipamento.');
    }
}
