<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallLocationPicker extends Component
{
    /**
     * Create a new component instance.
     */
    protected $omnidata;
    public function __construct( public bool $bubbleclosed )
    {
        $omnidata=session('omni_data');
        $this->omnidata = $omnidata;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.small-location-picker',['location'=>$this->omnidata['preffered_location'], 'all_locations'=>$this->omnidata['available_locations']]);
    }
}
