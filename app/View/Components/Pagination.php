<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $paginator;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $paginator
     * @return void
     */
    public function __construct($paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
