<?php

namespace App\View\Components\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuickAction extends Component
{
    public $title;

    public $description;

    public $icon;

    public $route;

    public $color;

    public $permission;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $title = '',
        $description = '',
        $icon = 'Plus',
        $route = '',
        $color = 'primary',
        $permission = null
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->icon = $icon;
        $this->route = $route;
        $this->color = $color;
        $this->permission = $permission;
    }

    /**
     * Check if user has permission to access this action
     */
    public function canAccess()
    {
        if (! $this->permission) {
            return true;
        }

        return auth()->user() && auth()->user()->can($this->permission);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widgets.quick-action');
    }
}
