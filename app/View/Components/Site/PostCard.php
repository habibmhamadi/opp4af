<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.post-card')->with(['post' => $this->post]);
    }
}
