<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Models\Icon;
use Illuminate\Http\Request;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $icon=Icon::with('tyres')->get();
        return view('ProductManager::admin.icon.index' ,compact('icon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ProductManager::admin.icon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
        ]);

        $icon = Icon::create([
            'name' => strtoupper($request->name),
            'class' => $request->class
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Icon $icon)
    {
        return view('ProductManager::admin.icon.edit' ,compact('icon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Icon $icon)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
        ]);

        $icon->update([
            'name' => strtoupper($request->name),
            'class' => $request->class
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Icon $icon)
    {
        if($icon->id){
            $icon->tyres()->detach();
            $icon->delete();

            return redirect()->route('ProductManager::admin.icon.index')->with('status','Icon deleted');
        }
    }
}
