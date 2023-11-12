<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;

class blogItem extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $blogItem)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.blog-item');
    }
}
