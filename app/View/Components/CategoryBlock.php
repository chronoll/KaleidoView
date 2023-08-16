<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;

class CategoryBlock extends Component
{
    public $category;
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $category,array $posts)
    {
        $this->category=$category;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-block');
    }
}
