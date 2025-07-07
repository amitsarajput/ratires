<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Models\Brand;
use ProductManager\Models\Country;
use ProductManager\Models\SearchTag;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        //
        $brand=Brand::all();
        //dd($brand);
        return view('ProductManager::admin.brand.index', compact('brand'));
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
        $search_tags_all=SearchTag::all()->pluck('name','id');
        //dd($country);
        return view('ProductManager::admin.brand.create', compact('country','search_tags_all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'country' => ['required','array'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:'.Brand::class],
            'search_tags' => ['required','array'],
            'search_tags.*' => ['string', 'max:255'],
        ]);

        $brand = Brand::create([
            'name' =>  $request->name,
            'slug' => strtolower($request->slug),
        ]);
        
        $b_countries=[];
        foreach ($request->country as $key => $value) {
            $b_countries[$value]=['kram'=>$key];
        }
        $brand->countries()->attach($b_countries);
        
        $b_search_tags=[];
        foreach ($request->search_tags as $key => $value) {
            $b_search_tags[$value]=['kram'=>$key];
        }
        //dd($b_search_tags);
        $brand->search_tags()->attach($b_search_tags);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return ucfirst($item);
        });
        $search_tags_all=SearchTag::all()->pluck('name','id');
        return view('ProductManager::admin.brand.edit', compact('country','brand','search_tags_all'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $request->validate([
            'country' => ['required','array'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'search_tags' => ['required','array'],
            'search_tags.*' => ['string', 'max:255'],
        ]);

        $brand->update([
            'name' => $request->name,
            'slug' => strtolower($request->slug),
        ]);
        
        $b_countries=[];
        foreach ($request->country as $key => $value) {
            $b_countries[$value]=['kram'=>$key];
        }
        $brand->countries()->sync($b_countries);

        $b_search_tags=[];
        foreach ($request->search_tags as $key => $value) {
            $b_search_tags[$value]=['kram'=>$key];
        }
        $brand->search_tags()->sync($b_search_tags);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if($brand->id){
            $brand->countries()->detach();
            $brand->search_tags()->detach();
            $brand->delete();

            return redirect()->route('ProductManager::admin.brand.index')->with('status','Brand deleted');
        }
    }
}
