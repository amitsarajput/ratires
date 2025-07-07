<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Models\Brand;
use ProductManager\Models\Country;
use ProductManager\Models\Icon;
use ProductManager\Models\SearchTag;
use Illuminate\Http\Request;

class SearchTagController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchtag=SearchTag::with('brands')->get();        
        return view('ProductManager::admin.searchtag.index', compact('searchtag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return ucfirst($item);
        });

        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return ucfirst($item);
        });
        $icon=Icon::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        //dd($brand);
        return view('ProductManager::admin.searchtag.create', compact(['brand','icon','country']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'country' => ['required','array'],
            'brand' => ['required', 'array' ],
            'icon' => ['required', 'integer' ],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:'.SearchTag::class]
        ]);

        $searchtag = SearchTag::create([
            'name' => strtoupper($request->name),
            'icon_id' => $request->icon,
            'slug' => strtolower($request->slug),
            'external_link' => strtolower($request->external_link),
        ]);
        //$searchta=SearchTag::find($searchtag);
        $t_brand=[];
        foreach ($request->brand as $key => $value) { 
            $t_brand[$value]=['kram'=>$key];
        }
        $searchtag->brands()->attach($t_brand);
        
        $b_countries=[];
        foreach ($request->country as $key => $value) {
            $b_countries[$value]=['kram'=>$key];
        }
        $searchtag->countries()->attach($b_countries);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SearchTag $searchTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SearchTag $searchtag)
    {   
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return ucfirst($item);
        });

        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return ucfirst($item);
        });

        $icon=Icon::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        return view('ProductManager::admin.searchtag.edit', compact('brand','icon','searchtag','country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SearchTag $searchtag)
    {
        //
        $request->validate([
            'country' => ['required', 'array' ],
            'brand' => ['required', 'array' ],
            'icon' => ['required', 'integer' ],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);

        $searchtag ->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => strtolower($request->slug),
            'external_link' => strtolower($request->external_link),
        ]);
        //$searchta=SearchTag::find($searchtag);
        $t_brand=[];
        foreach ($request->brand as $key => $value) { 
            $t_brand[$value]=['kram'=>$key];
        }
        $searchtag->brands()->sync($t_brand);
        
        $b_countries=[];
        foreach ($request->country as $key => $value) {
            $b_countries[$value]=['kram'=>$key];
        }
        $searchtag->countries()->sync($b_countries);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SearchTag $searchtag)
    {
        if($searchtag->id){
            $searchtag->brands()->detach();
            $searchtag->delete();
            return redirect()->route('ProductManager::admin.searchtag.index')->with('status','SearchTag deleted');
        }
    }
}
