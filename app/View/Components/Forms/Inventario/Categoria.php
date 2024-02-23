<?php

namespace App\View\Components\Forms\Inventario;

use App\Models\Categoria as CCategoria;
use Illuminate\View\Component;

class Categoria extends Component
{
    /**
     * @var metodo
     * Método do formulário: Vamos criar ou editar?
     * 
     * @var instancia
     * Qual o identificador da instância do objeto estamos requerendo?
     * 
     * @var ct
     * Instância da categoria
     * 
     * @var contabilContaId
     * Workaround para conseguir utilizar a conta contábil em um outro componente (ContabilContaSelect)
     * 
     **/
    public $metodo;
    public $instancia;
    public $ct;
    public $contabilContaId;

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
            $categoria = CCategoria::find($instancia);
            $this->ct = $categoria;
            $this->contabilContaId = $categoria->contabil_conta_id;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.inventario.categoria');
    }
}
