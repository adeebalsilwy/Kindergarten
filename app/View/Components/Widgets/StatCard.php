<?php

namespace App\View\Components\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public $title;

    public $value;

    public $description;

    public $icon;

    public $color;

    public $trend;

    public $trendValue;

    public $route;

    public $format;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $title = '',
        $value = 0,
        $description = '',
        $icon = 'Info',
        $color = 'primary',
        $trend = null,
        $trendValue = null,
        $route = null,
        $format = 'number'
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->description = $description;
        $this->icon = $icon;
        $this->color = $color;
        $this->trend = $trend;
        $this->trendValue = $trendValue;
        $this->route = $route;
        $this->format = $format;
    }

    /**
     * Format the value based on format type
     */
    public function getFormattedValue()
    {
        switch ($this->format) {
            case 'currency':
                return '$'.number_format($this->value, 2);
            case 'percentage':
                return number_format($this->value, 1).'%';
            case 'number':
            default:
                return number_format($this->value);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widgets.stat-card');
    }
}
