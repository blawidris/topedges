<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FlashMessage extends Component
{

    public $status, $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flash-message');
    }
}
