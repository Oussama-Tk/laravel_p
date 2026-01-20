<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class master extends Component
{
    /**
     * Create a new component instance.
     */

    public $etudiants = [
            ['nom' => 'Ahmed', 'note' => 15],
            ['nom' => 'Mohamed', 'note' => 9],
            ['nom' => 'Khadija', 'note' => 12],
            ['nom' => 'Adam', 'note' => 18],
        ];

    public function __construct($etudiants = null)
    {
        if($etudiants !== null)
            {
                $this->etudiants = $etudiants ;
            }
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.master');
    }
}
