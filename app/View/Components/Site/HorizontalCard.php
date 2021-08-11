<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class HorizontalCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($opportunity)
    {
        $this->opportunity = $opportunity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.horizontal-card')->with(['opportunity' => $this->opportunity]);
    }
}
