<?php

namespace App\View\Components\Utils\Formidable;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $metodo;
    public $objeto;
    public $identificador;
    public $nome;
    public $label;
    public $dica;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metodo, $objeto, $identificador, $nome = null, $label = null, $dica = null)
    {
        $this->metodo = $metodo;
        $this->objeto = $objeto;
        $this->identificador = $identificador;
        $this->nome = ($nome ? $nome : $identificador);
        $this->label = ($label ? $label : ucfirst($identificador));
        $this->dica = $dica;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utils.formidable.text-input');
    }
}
