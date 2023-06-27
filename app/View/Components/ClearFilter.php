<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class ClearFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Request $request
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $queryNull = $this->request->query('filter') === null ? true : false;
        return view('components.clear-filter', compact('queryNull'));
    }
}
