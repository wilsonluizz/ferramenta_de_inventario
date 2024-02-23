<?php

namespace App\View\Components\Forms\Inventario;
use App\Models\Marca as MarcaEquipamento;

use Illuminate\View\Component;

class Marca extends Component
{

    /**
     * @var metodo
     * Método do formulário: Vamos criar ou editar?
     * 
     * @var instancia
     * Qual o identificador da instância do objeto estamos requerendo?
     * 
     * @var mm
     * Instância da marca
     * 
     */
    public $metodo;
    public $instancia;
    public $mm;

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

            $marca = MarcaEquipamento::find($instancia);
            $this->mm = $marca;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.inventario.marca');
    }
}
