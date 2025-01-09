<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
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
        $region=Region::all();
        return view('admin.region.index' ,compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:'.Region::class]
        ]);

        $region = Region::create([
            'name' => $request->name,
            'code' => strtoupper($request->code),
            'slug' => strtolower($request->slug),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        //
        //$region=Region::all()->toArray();
        return view('admin.region.edit' ,compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        //
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255']
        ]);

        $region ->update([
            'name' => $request->name,
            'code' => strtoupper($request->code),
            'slug' => strtolower($request->slug),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        if($region->id){
            $region->delete();
            return redirect()->route('admin.region.index')->with('status','Region deleted');
        }
    }
}
