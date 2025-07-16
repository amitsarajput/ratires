<?php

namespace ProductManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ProductManager\Models\Tyre; // Adjust model as needed
use ProductManager\Models\Region;
use ProductManager\Models\Country;

class SearchController extends Controller
{
    //
    public function index(Request $request, $region=null)
    {
        //dd($region)        
        $tyres=collect([]);        
        $query = '';

        if($request->method()==='POST'){
            if ($region!==null) {
                $r_id=Region::where('slug', $region)->first();
            }
            $query = $request->input('query');
            $query = strip_tags($query); // Removes HTML tags
            $query = preg_replace('/[^A-Za-z0-9\s]/', '', $query); // Removes special characters
            if ($query!=='') { 
                $tyres = Tyre::where(function ($q) use ($query) {
                            $q->where('name', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%");
                        })->where('publish', '1')->where('region_id', $r_id->id)

                        ->get();
                    }
        }
        
        // if (trim($query)==='' || $region===null) {
        //     return view('search', compact('tyres', 'query'));
        // }
            return view('search', compact('tyres', 'query'));
    }

}
