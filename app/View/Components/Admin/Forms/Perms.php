<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Perms extends Component
{

    public $type;
    public $permissao;
    public $perfis;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $permissao = null, $perfis = null)
    {
        $this->type = $type;
        $this->permissao = $permissao;
        $this->perfis = $perfis;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.perms');
    }
}
