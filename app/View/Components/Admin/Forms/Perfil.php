<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Perfil extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $perfil;
    public $perms;
    public $usuarios;

    public function __construct($type = null, $perfil = null, $perms = null, $usuarios = null)
    {
        $this->type = $type;
        $this->perfil = $perfil;
        $this->perms = $perms;
        $this->usuarios = $usuarios;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.perfil');
    }
}
