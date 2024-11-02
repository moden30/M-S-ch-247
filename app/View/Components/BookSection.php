<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookSection extends Component
{
    /**
     * Create a new component instance.
     */

    public $heading, $books, $sectionId;

    public function __construct($heading, $books, $sectionId)
    {
        $this->heading = $heading;
        $this->books = $books;
        $this->sectionId = $sectionId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-section');
    }
}
