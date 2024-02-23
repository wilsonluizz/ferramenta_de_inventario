<?php

namespace App\View\Components\Utils\Formidable;

use Illuminate\View\Component;

class Select extends Component
{
    public $metodo;
    public $objeto;
    public $identificador;
    public $nome;
    public $label;
    public $dica;

    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metodo, $objeto, $identificador, $nome = null, $label = null, $dica = null, $selected = null)
    {
        $this->metodo = $metodo;
        $this->objeto = $objeto;
        $this->identificador = $identificador;
        $this->nome = ($nome ? $nome : $identificador);
        $this->label = ($label ? $label : ucfirst($identificador));
        $this->dica = $dica;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utils.formidable.select');
    }
}
