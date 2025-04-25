<?php

namespace App\View\Components;

use App\Models\Country;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Stevebauman\Location\Facades\Location;

class UserLocationBubble extends Component
{
    /**
     * Create a new component instance.
     */
    
    protected $omnidata;



    public function __construct(public bool $bubbleclosed)
    {   
        //session()->forget(['omni_data','locale']);
        $omnidata=session('omni_data');
        //dd(session('omni_data'));
        //Set avialable locations in sessions
        $available_locations=$omnidata['available_locations'];
        //Set from globals
        $default_location=$omnidata['default_location']; 
        $user_location=$omnidata['user_location']; 
        $preffered_location=$omnidata['preffered_location'];
                
        //Initial redirect 
        if($preffered_location===''){ //No Preffered Location 
            //Bypassing user location check
            $preffered_location=$default_location; 
            //User location check (if else will not be checked.)
            // $user_location = Location::get('103.226.226.86'); // '103.226.226.86' '101.33.18.0' '1.32.128.0' 
            // $omnidata['user_location']=$user_location->countryCode; 
            // if(!empty($user_location)){    //User Location 
            //     if (in_array($user_location->countryCode, $available_locations)) { //User Location in Available Location
            //         $preffered_location=$user_location->countryCode; 
            //         $omnidata['country']=$user_location->countryCode; 
            //     }else { //User Location not in Available Location 
            //         $preffered_location=$default_location; //default location 
            //     } 
            // } else{//No User Location
            //     $preffered_location=$default_location;   //default location
            // }

            //$omnidata['preffered_location']=$preffered_location;//Set Global
        }

        //check preffered_location in avilable country
        if (!in_array($preffered_location,$available_locations)) {
            $preffered_location=$default_location;
        }
        $omnidata['preffered_location']=$preffered_location;

        session(['omni_data' => $omnidata]);//Update Session Data
        $this->omnidata = $omnidata;//Update Session Data
        //print_r($this->omnidata);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        return view('components.user-location-bubble', ['location'=>$this->omnidata['preffered_location'], 'all_locations'=>$this->omnidata['available_locations']]);
    }
}
