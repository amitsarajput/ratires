<?php
namespace ProductManager\Http\Controllers;

use ProductManager\Models\TyreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TyreCategoryController extends Controller
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
        $tyrecategory=TyreCategory::all();
        return view('ProductManager::admin.tyrecategory.index', compact('tyrecategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$tyrecategory=TyreCategory::all()->pluck('name','id');
        return view('ProductManager::admin.tyrecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['max:255'],
        ]);

        $tyrecategory = TyreCategory::create([
            'name' => strtoupper($request->name),
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TyreCategory $tyreCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TyreCategory $tyreCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TyreCategory $tyreCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TyreCategory $tyreCategory)
    {
        if($tyreCategory->id){
            $tyreCategory->tyres()->detach();
            $tyreCategory->delete();
            return redirect()->route('ProductManager::admin.tyrecategory.index')->with('status','Tyre Category deleted');
        }
    }
}
