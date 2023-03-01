<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $variant;
    public $outline;
    public $header;
    public $title;
    public $body;
    public $footer;

    public function __construct($variant = '', $outline = false, $header = null, $title = null,$body = null,$footer = null)
    {
        $this->variant = $variant;
        $this->outline = $outline;
        $this->header  = $header;
        $this->title   = $title;
        $this->body    = $body;
        $this->footer  = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
