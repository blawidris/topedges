<?php

namespace App\View\Components\Admin\Dashboard;

use Illuminate\View\Component;

class CustomerTableRow extends Component
{
    public $customer;
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dashboard.customer-table-row');
    }
}
