<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\SearchTag;
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
        $rgn=Region::all();
        return view('admin.region.index' ,compact('rgn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $search_tags_all=SearchTag::all()->pluck('name','id');
        return view('admin.region.create', compact('search_tags_all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'locale_code' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255','unique:'.Region::class],
            'search_tags' => ['required','array'],
            'search_tags.*' => ['string', 'max:255'],
            'order' => ['required'],
        ]);
        $updataarray=[
            'name' => $request->name,
            'code' => strtolower($request->code),
            'locale_code' => strtolower($request->locale_code),
            'slug' => strtolower($request->slug),
            'published'=>0,
            'order' => $request->order,
        ];
        if ($request->published) { $updataarray['published']=1;}

        $region = Region::create($updataarray);

        $b_search_tags=[];
        foreach ($request->search_tags as $key => $value) {
            $b_search_tags[$value]=['kram'=>$key];
        }
        $region->search_tags()->sync($b_search_tags);

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
    public function edit(Region $rgn) 
    {
        //
        //$region=Region::all()->toArray();
        $search_tags_all=SearchTag::all()->pluck('name','id');
        return view('admin.region.edit' ,compact('rgn','search_tags_all'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $rgn)
    {
        //
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'locale_code' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'search_tags' => ['required','array'],
            'search_tags.*' => ['string', 'max:255'],
            'order' => ['required'],
        ]);
        $updataarray=[
            'name' => $request->name,
            'code' => strtolower($request->code),
            'locale_code' => strtolower($request->locale_code),
            'slug' => strtolower($request->slug),
            'published'=>0,
            'order' => $request->order,
        ];
        if ($request->published) { $updataarray['published']=1;}
        $rgn ->update($updataarray);

        $b_search_tags=[];
        foreach ($request->search_tags as $key => $value) {
            $b_search_tags[$value]=['kram'=>$key];
        }
        $rgn->search_tags()->sync($b_search_tags);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $rgn)
    {
        if($rgn->id){
            $rgn->delete();
            return redirect()->route('admin.rgn.index')->with('status','Region deleted');
        }
    }
}
