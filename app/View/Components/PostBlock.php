<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostBlock extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-block');
    }
}
