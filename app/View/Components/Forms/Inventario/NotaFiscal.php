<?php

namespace App\View\Components\Forms\Inventario;

use Illuminate\View\Component;

class NotaFiscal extends Component
{
    public $metodo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($metodo = null)
    {
        $this->metodo = $metodo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.inventario.nota-fiscal');
    }
}
