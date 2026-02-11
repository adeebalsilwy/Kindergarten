<?php

namespace App\View\Components\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListCard extends Component
{
    public $title;

    public $items;

    public $icon;

    public $color;

    public $route;

    public $showViewAll;

    public $emptyMessage;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $title = '',
        $items = [],
        $icon = 'List',
        $color = 'primary',
        $route = null,
        $showViewAll = true,
        $emptyMessage = 'No items found'
    ) {
        $this->title = $title;
        $this->items = $items;
        $this->icon = $icon;
        $this->color = $color;
        $this->route = $route;
        $this->showViewAll = $showViewAll;
        $this->emptyMessage = $emptyMessage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widgets.list-card');
    }
}
