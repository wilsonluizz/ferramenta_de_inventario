<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marca.index', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required',
        ]);
        
        unset($request["_token"], $request["_method"]);

        $m = new Marca;
        foreach ($request->all() as $key => $value) {
            $m->$key = $value;
        }

        if($m->save())
            $callback = [
                'message' => 'Marca registrada com sucesso', 
                'style' =>'primary'
            ];
        else
            $callback = [
                'message' => 'Ocorreu um erro ao criar a marca',
                'style' =>'danger'
            ];

        return redirect()->route('marca.index')->with($callback);
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
        $this->validate($request, [
            'marca' => 'required',
        ]);

        unset($request["_token"], $request["_method"]);

        $m = Marca::find($id);
        foreach ($request->all() as $key => $value) {
            $m->$key = $value;
        }
        
        if($m->update())
            $callback = [
                'message' => 'Marca alterada com sucesso', 
                'style' =>'primary'
            ];
        else
            $callback = [
                'message' => 'Ocorreu um erro ao atualizar a marca',
                'style' =>'danger'
            ];

        return redirect()->route('marca.index')->with($callback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marca::find($id)->delete();
        return redirect()->route('marca.index')->with([
            'message' => 'Marca excluída com sucesso!', 
            'style' => 'danger',
        ]);
    }
}
