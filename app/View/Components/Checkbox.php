<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    private string $label;
    private string $field;
    private bool $checked;
    /**
     * Create a new component instance.
     */
    public function __construct(string $label, string $field, bool $checked = false)
    {
        $this->label = $label;
        $this->field = $field;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox', [
            "label" => $this->label,
            "field" => $this->field,
            "checked" => $this->checked,
        ]);
    }
}
