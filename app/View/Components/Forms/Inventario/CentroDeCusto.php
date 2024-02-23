<?php

namespace App\View\Components\Forms\Inventario;

use App\Models\CentroDeCusto as CC;
use Illuminate\View\Component;

class CentroDeCusto extends Component
{

    /**
     * @var metodo
     * Método do formulário: Vamos criar, editar ou apenas visualizar?
     * 
     * @var instancia
     * Qual o identificador da instância do objeto estamos requerendo?
     * 
     * @var cc
     * Instância do centro de custo
     * 
     */
    public $metodo;
    public $instancia;
    public $cc;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metodo, $instancia = null)
    {
        $this->metodo = $metodo;
        
        if(!is_null($instancia)) {
            $this->instancia = $instancia;

            $centro_de_custo = CC::find($instancia);
            $this->cc = $centro_de_custo;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.inventario.centro-de-custo');
    }
}
