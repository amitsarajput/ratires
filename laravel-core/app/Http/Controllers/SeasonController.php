<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
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
        $season=Season::all();
        return view('admin.season.index' ,compact('season'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $icon=Icon::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        return view('admin.season.create' ,compact('icon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon_id' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);

        $icon = Season::create([
            'name' => strtoupper($request->name),
            'icon_id' => $request->icon_id,
            'slug' => $request->slug
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        
        
        //dd($season);
        $icon=Icon::all()->pluck('name','id')->map(function (string $item, string $key) {
           return strtoupper($item);
        });
        return view('admin.season.edit' ,compact('season','icon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon_id' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ]);

        $season->update([
            'name' => strtoupper($request->name),
            'icon_id' => $request->icon_id,
            'slug' => $request->slug
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        if($season->id){
            //$season->tyres()->detach();
            $season->delete();

            return redirect()->route('admin.season.index')->with('status','Season deleted');
        }
    }
}
