<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast\String_;

class BaseLayout extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;

    public function __construct(String $title)
    {
        $this->title = $title ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.base-layout');
    }
}
