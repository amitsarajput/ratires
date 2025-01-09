<?php

namespace App\View\Components;

use App\Models\Dealer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DealerLocatorWidget extends Component
{
    protected $AllStores;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $preffered_location=session('omni_data.preffered_location');
        //$this->AllStores=Dealer::where('countrycode', $preffered_location)->get()->map(function(Dealer $dealer) {
        $this->AllStores=Dealer::all()->map(function(Dealer $dealer) {
            return json_decode($dealer->postdata,true);
            //return $dealer->postdata;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dealer-locator-widget', ['stores'=>$this->AllStores] );
    }
}
