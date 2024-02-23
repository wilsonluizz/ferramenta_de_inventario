<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toaster extends Component
{
    public $message;
    public $style;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($style, $message)
    {
        $this->style = $style;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toaster');
    }
}
