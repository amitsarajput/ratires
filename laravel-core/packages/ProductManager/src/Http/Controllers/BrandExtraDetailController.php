<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Models\Brand;
use ProductManager\Models\BrandExtraDetail;
use ProductManager\Models\Country;
use Illuminate\Http\Request;

class BrandExtraDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['tyre_grid','tyre_single','testing']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brandextras=BrandExtraDetail::with('country','brand')->get();
        return view('ProductManager::admin.brand.index-extras',compact('brandextras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        return view('ProductManager::admin.brand.create-extras',compact('country','brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'country' => ['required', 'integer'],
            'brand' => ['required', 'integer']
        ]);
        $brandextras = BrandExtraDetail::create([
            'country_id' => $request->country,
            'brand_id' => $request->brand,
            'text' => json_encode($request->text),
            'slider' => json_encode($request->slider)
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandExtraDetail $brandExtraDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandExtraDetail $brandextradetail)
    {
        //
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        return view('ProductManager::admin.brand.edit-extras',compact('brandextradetail','country','brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandExtraDetail $brandextradetail)
    {
        //
        $request->validate([
            'country' => ['required', 'integer'],
            'brand' => ['required', 'integer']
        ]);
        $brandextradetail->update([
            'country_id' => $request->country,
            'brand_id' => $request->brand,
            'text' => json_encode($request->text),
            'slider' => json_encode($request->slider)
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandExtraDetail $brandextradetail)
    {
        if($brandextradetail->id){
        $brandextradetail->delete();
        return redirect()->route('ProductManager::admin.brandextradetail.index')->with('status','Detail deleted.');
    }
    }
}
