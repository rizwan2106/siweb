<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoanLogTable extends Component
{
    public $loanlog;
    /**
     * Create a new component instance.
     */
    public function __construct($loanlog)
    {
        $this->loanlog = $loanlog;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loan-log-table');
    }
}