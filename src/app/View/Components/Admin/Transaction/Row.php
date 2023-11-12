<?php

namespace App\View\Components\Admin\Transaction;

use Illuminate\View\Component;

class Row extends Component
{

    public $trans;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trans)
    {
        $this->trans = $trans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.transaction.row');
    }
}
