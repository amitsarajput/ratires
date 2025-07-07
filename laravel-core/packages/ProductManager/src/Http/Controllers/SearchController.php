<?php

namespace ProductManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ProductManager\Models\Tyre; // Adjust model as needed
use ProductManager\Models\Country;

class SearchController extends Controller
{
    //
    public function index(Request $request, $country=null)
    {
        if ($country!==null) {
            $c_id=Country::where('slug', $country)->first();
        }
        $query = $request->input('query');
        $query = strip_tags($query); // Removes HTML tags
        $query = preg_replace('/[^A-Za-z0-9\s]/', '', $query); // Removes special characters
        $tyres=collect([]);
        if (trim($query)==='' || $country===null) {
            return view('search', compact('tyres', 'query'));
        }
        if ($query!=='') { 
            $tyres = Tyre::where(function ($q) use ($query) {
                        $q->where('name', 'like', "%$query%")
                          ->orWhere('description', 'like', "%$query%");
                    })->where('publish', '1')->where('country_id', $c_id->id)
                    
                    ->get();
                return view('search', compact('tyres', 'query'));
        }
        else {
            return view('search', compact('tyres', 'query'));
        }
    }
}
