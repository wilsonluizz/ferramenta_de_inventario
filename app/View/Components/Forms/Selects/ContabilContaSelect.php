<?php

namespace App\View\Components\Forms\Selects;

use App\Models\ContabilConta;
use Illuminate\View\Component;

class ContabilContaSelect extends Component
{
    /**
     * @var metodo
     * Qual método do formulário?
     * 
     * @var instancia
     * Qual instância do objeto estamos falando?
     */
    public $metodo;
    public $instancia;
    public $contabilContaId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metodo, $contabilContaId = null)
    {
        $this->metodo = $metodo;

        if(!is_null($contabilContaId)) {
            $this->contabilContaId = $contabilContaId;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contabilConta = ContabilConta::all();
        return view('components.forms.selects.contabil-conta-select', compact('contabilConta'));
    }
}
