<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandExtraDetail;
use App\Models\Country;
use App\Models\Icon;
use App\Models\Region;
use App\Models\SearchTag;
use App\Models\Season;
use App\Models\Tyre;
use App\Models\TyreCategory;
use Illuminate\Database\Query\Builder;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Stevebauman\Location\Facades\Location;

use App\Http\Controllers\XlsxController;
use Illuminate\Support\Facades\Route;

class TyreController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['tyre_grid','tyre_single','testing']);
        //$action = Route::currentRouteAction();
        //dd($action); // App\Http\Controllers\TyreController@tyre_single
    }
    /**
     * Display a listing of the resource.
     */
    
    protected $catlog_path='/public/tire_images';
    protected $other_path='/public/tire_images/other';
    protected $feature_path='/public/features';

    

    public function handleFile($file, $path){
        $fileName = $file->getClientOriginalName(); 
        $fileStore=$file->storeAs($path, $fileName);
        return $fileName;
    }
    public function testing($country){
        //dd($country);
        $omni_data=session('omni_data');
        $br = $omni_data['brand'];
        $brand = Brand::with('countries')->where('slug', $br)->first();
        $country=$brand->countries()->firstWhere('country_id',$country);
        dd($country->pivot->kram);
    }
    public function tyre_grid($region = null, ?string $country = null, $brand = null)
    {
        $omni_data = session('omni_data');
        
        // Validate country availability
        if (!in_array($country, $omni_data['available_locations'] ?? [])) {
            $country = null;
        }
        
        // Set variables with fallback to session data
        $region_str = $region ?? $omni_data['region'] ?? null;
        $country_str = $country ?? $omni_data['country'] ?? null;
        $brand_str = $brand ?? $omni_data['brand'] ?? null;
        
        // If region or brand is missing, abort with 404
        if (!$region_str || !$brand_str) {
            abort(404, 'Region or Brand not specified.');
        }
        
        // Set updated session values
        $omni_data['region'] = $region_str;
        $omni_data['country'] = $country_str;
        $omni_data['preffered_location'] = $country_str ?? $region_str;
        //$omni_data['brand'] = $brand_str;
        session(['omni_data' => $omni_data]);
        
        $brand_country = strtolower($brand_str . '-' . $country_str);
        
        // Load region
        $region_model = Region::with('search_tags')->where('slug', $region_str)->first();
        if (!$region_model) {
            abort(404, 'Region not found.');
        }
        
        // Load country if provided
        $country_model = null;
        if (!empty($country_str)) {
            $country_model = Country::with('brands')->where('slug', $country_str)->first();
        }
        
        // Load brand
        $brand_model = Brand::where('slug', $brand_str)->first();
        if (!$brand_model) {
            abort(404, 'Brand not found.');
        }
        
        // Get search tags from region
        $search_tags = $region_model->search_tags;
        
        // Get all seasons
        $seasons = Season::all();
        
        // Get tyres for region and brand
        $tyres = Tyre::with(['region', 'brand', 'search_tag', 'icons', 'tyre_categories', 'season'])
        ->where([
            'region_id' => $region_model->id,
            'brand_id' => $brand_model->id,
            'publish' => 1,
            ])
            ->orderBy('order', 'asc')
            ->get();
            
            return view('tyre-grid', compact('tyres', 'search_tags', 'brand_country', 'seasons'));
        }


    public function tyre_grid_old($region=null, ?string $country=null, $brand='radar')
    {
        $omni_data=session('omni_data');
        if (!in_array($country,$omni_data['available_locations'])) {
            $country=null;
        }
        //Set variables//
        $region_str= ($region!==null) ? $region : $omni_data['region'];
        $country_str= ($country!==null) ? $country : $omni_data['country'];
        $brand_str=$omni_data['brand'];
        
        
        //Set session data//
        $omni_data['region']=$region_str;
        $omni_data['country']=$country_str;
        $omni_data['preffered_location']=$country_str??$region_str;
        $omni_data['brand']=$brand_str;
        session(['omni_data'=>$omni_data]);
        //dd(session('omni_data'));
        //set view
        $brand_country=strtolower($omni_data['brand'].'-'.$omni_data['country']);
        
        //Find tyres
        $region=Region::with('search_tags')->where('slug', $region_str)->first();
        //dd($region_str, $country_str, $brand_str);
        $country=null;
        if($country_str!==''){ 
            $country=Country::with('brands')->where('slug', $country_str)->first();
        }
        $brand=Brand::firstWhere('slug', $brand_str);
        //dd($region,$country_str,$brand);
        //$search_tags = SearchTag::getTagsByCountryAndBrand($country->id, $brand->id);
        $search_tags = $region->search_tags;
        // Get seasons
        $seasons=Season::all();//->pluck('name','id')
        //dd($brand);
        //if (empty($search_tags)){
            //print_r('0 search_tags');
            //abort(404);
            //}
            
            $tyres=Tyre::with('region','brand','search_tag','icons','tyre_categories','season')->where(['region_id'=>$region->id,'brand_id'=>$brand->id, 'publish'=>1])->orderBy('order', 'asc')->get();
            //dd($tyres);

        //get brand details based on country and brand
        //$branddetails=BrandExtraDetail::getBEDByCountryAndBrand($country->id, $brand->id);
        //$branddetailstext=$branddetails?explode('****',json_decode($branddetails->text)):'';
        //dd($branddetails);
        return view('tyre-grid',compact('tyres','search_tags','brand_country','seasons'));//,'branddetailstext'
    }
    

    /**
     * Display the specified resource.
     */
    public function tyre_single($region=null, ?string $country=null, $brand=null, $tyre=null)
    {
        
        // Retrieve session data
        $omni_data = session('omni_data');

        // Retrieve all the slugs from url 
        $regionSlug=extractRegionFromUrl();
        $countrySlug=extractCountryFromUrl();
        
        //Adjust slugs if country is provided or not
        if ($countrySlug===null) {
            $brandSlug=$country ?? $omni_data['brand'];
            $tyreSlug=$brand;
        }else {
            $brandSlug=$brand ?? $omni_data['brand'];
            $tyreSlug=$tyre;
        }
        
        // Retrieve tyre with slug.
        if ($tyreSlug!==null) {
            $tyre = Tyre::whereSlug($tyreSlug)->where('publish', 1)->first();
        }
        
        return view('tyre-single',compact('tyre'));
        //dd($regionSlug, $countrySlug, $brandSlug, $tyre);
    }
    
    public function index()
    {
        $tyre=Tyre::with('country','brand','search_tag')->orderBy('created_at', 'desc')->get();
        return view('admin.tyre.index',compact('tyre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $region=Region::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $searchtag=SearchTag::all()->pluck('name','id');
        $tyrecategory=TyreCategory::all()->pluck('name','id');
        $icon=Icon::all()->pluck('name','id');
        $season=Season::all()->pluck('name','id');

        return view('admin.tyre.create',compact('region','country','brand','searchtag','icon','tyrecategory','season'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'region' => ['required', 'integer'],
            'country' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'searchtag' => ['required', 'integer'],
            'season' => ['required', 'integer'],
            'icon' => ['required', 'array'],
            'name' => ['required', 'string', 'max:255'],
            'previewname' => ['required', 'string', 'max:255'],
            'tyrecategory' => ['required', 'array'],
            'externallink' => ['string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'slug' => ['required', 'string', 'max:255', 'unique:'.Tyre::class],
            'catalogue_image' => ['file','mimes:webp,jpg,png','max:6024'],
            'product_images' => ['array','nullable'],
            'product_images.*' => ['file','mimes:webp,jpg,png','max:6024','nullable'],
        ]);
        $createtyrearray =[
                'region_id' => $request->region,
                'country_id' => $request->country,
                'brand_id' => $request->brand,
                'search_tag_id' => $request->searchtag,
                'season_id' => $request->season,
                'name' => $request->name,
                'preview_name' => htmlspecialchars($request->previewname),
                'slug' => strtolower($request->slug),
                'external_link' => $request->externallink,
                'description' => htmlspecialchars($request->description),
                'premium_tyre'=>null,
                'publish'=>0
        ];
        if ($request->premium_tyre) { $createtyrearray['premium_tyre']=1;}
        if ($request->publish) { $createtyrearray['publish']=1;}

        $tyre = Tyre::create($createtyrearray);
        // Premium tyre update
        

        if ($request->hasFile('catalogue_image')&& $request->file('catalogue_image')->isValid()) {
            $file=$this->handlefile($request->catalogue_image, $this->catlog_path);
            $tyre->catalogue_image=$file;
            $tyre->save();
        }
        if ($request->hasFile('product_images')&& $request->file('product_images')) {
            $files=[];
            foreach($request->product_images as $key=>$value){
                $file=$this->handlefile($value, $this->other_path);
                $files[]=$file;
            }
            $tyre->product_images=json_encode($files);
            $tyre->save();
        }
        
        $t_icon=[];
        foreach ($request->icon as $key => $value) { 
            $t_icon[$value]=['kram'=>$key];
        }
        $tyre->icons()->sync($t_icon);
        
        $t_cat=[];
        foreach ($request->tyrecategory as $key => $value) {
            $t_cat[$value]=['kram'=>$key];
        }
        $tyre->tyre_categories()->sync($t_cat);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tyre $tyre)
    {   
        //$search_tags=Brand::find($brand)->search_tags;
        //dd($tyre->with('country','brand','search_tag','icons'));
        //$tyre=Tyre::with('country','brand','search_tag','icons')->where(['country_id'=>$tyre->country,'brand_id'=>$tyre->brand,'slug'=>$tyre->slug])->first();
        //dump($tyre);
        //$tyre=$tyre->with('country','brand','search_tag','icons');
        return view('tyre-single',compact('tyre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tyre $tyre)
    {
        $region=Region::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $searchtag=SearchTag::all()->pluck('name','id');
        $tyrecategory=TyreCategory::all()->pluck('name','id');
        $icon=Icon::all()->pluck('name','id');
        $season=Season::all()->pluck('name','id');

        return view('admin.tyre.edit',compact('tyre','region','country','brand','searchtag','icon','tyrecategory','season'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tyre $tyre)
    {
        //dd($request);
        $request->validate([
            'region' => ['required', 'integer'],
            'country' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'searchtag' => ['required', 'integer'],
            'season' => ['required', 'integer'],
            'icon' => ['required', 'array'],
            'name' => ['required', 'string', 'max:255'],
            'previewname' => ['required', 'string', 'max:255'],
            'tyrecategory' => ['required', 'array'],
            'externallink' => ['string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'catalogue_image' => ['file','mimes:webp,jpg,png','max:6024'],
            'product_images' => ['array'],
            'product_images.*' => ['file','mimes:webp,jpg,png','max:6024'],
        ]);
        $tyreupdataarray=[
            'region_id' => $request->region,
            'country_id' => $request->country,
            'brand_id' => $request->brand,
            'search_tag_id' => $request->searchtag,
            'season_id' => $request->season,
            'name' => $request->name,
            'preview_name' => htmlspecialchars($request->previewname),
            'slug' => strtolower($request->slug),
            'external_link' => $request->externallink,
            'description' => htmlspecialchars($request->description),
            'premium_tyre'=>null,
            'publish'=>0
        ];
        if ($request->premium_tyre) { $tyreupdataarray['premium_tyre']=1; }
        if ($request->publish) { $tyreupdataarray['publish']=1; }
        $tyre->update($tyreupdataarray);
        // Premium tyre update
        

        if ($request->hasFile('catalogue_image')&& $request->file('catalogue_image')->isValid()) {
            $file=$this->handlefile($request->catalogue_image, $this->catlog_path);
            $tyre->catalogue_image=$file;
            $tyre->save();
        }
        if ($request->hasFile('product_images')&& $request->file('product_images')) {
            $files=[];
            foreach($request->product_images as $key=>$value){
                $file=$this->handlefile($value, $this->other_path);
                $files[]=$file;
            }
            $tyre->product_images=json_encode($files);
            $tyre->save();
        }
        $t_icon=[];
        foreach ($request->icon as $key => $value) { 
            $t_icon[$value]=['kram'=>$key+1];
        }
        $tyre->icons()->sync($t_icon);
        
        $t_cat=[];
        foreach ($request->tyrecategory as $key => $value) {
            $t_cat[$value]=['kram'=>$key];
        }
        $tyre->tyre_categories()->sync($t_cat);
        
        return redirect()->back();
    }
    
    /**
     * Update the size of specified resource in storage.
     */
    public function size(Request $request, Tyre $tyre)
    {
        if($request->method()==='GET'){
            $tyre_sizes_array=json_decode( $tyre->sizes, true );
            if (!empty($tyre_sizes_array['sizes'])) {
                $old_file=XlsxController::createfile($tyre_sizes_array['sizes'], array_keys($tyre_sizes_array['sizes'][0]), $tyre->slug);
            }else{
                $old_file='No-File.xlsx';
            }
            return view('admin.tyre.size', compact('tyre', 'old_file'));
            //dd($old_file);						
        }
        if($request->method()=='POST'|| $request->method()=='PUT'){
            $request->validate([
                'sizes' => ['file','mimes:xlsx','max:6024'],
                'extra_cols'=>['array'],
                'extra_cols.*'=>['string'],
                'legends'=>['string']
            ]);
            
                $tyre_array=json_decode($tyre->sizes,true)??['sizes'=>'','extra_cols'=>'','legends'=>''];
                $tyre_sizes=$tyre_array['sizes'];
                $tyre_extra_cols=$tyre_array['extra_cols'];
                $tyre_legends=$tyre_array['legends'];
                
            
            
            $extra_cols_object=[
                "s_w"=>"S.W.",
	            "weather"=>"Weather",
	            "fuel"=>"Fuel",
	            "noise_db"=>"Noise",
	            "eulabel"=>"EU Label",
            ];
            $request_extra_cols=[];
            $request->extra_cols=$request->extra_cols??[];
            foreach ($request->extra_cols as $key => $value) {
                if (array_key_exists($value, $extra_cols_object)) {
                    $request_extra_cols[$value]=$extra_cols_object[$value];
                }
            }
            if($request_extra_cols!==$tyre_extra_cols){
                $tyre_array['extra_cols']=$request_extra_cols;
            }
            
            if(htmlspecialchars($request->legends)!==$tyre_legends){                
                $tyre_array['legends']=htmlspecialchars($request->legends);
            }
            if ($request->hasFile('sizes')&& $request->file('sizes')->isValid()) {
                $sizes=XlsxController::readxlfile($request->sizes,'sizes');
                //dd($sizes);
                if ($tyre_array['sizes']!==$sizes) {
                    $tyre_array['sizes']=$sizes;
                }
            }
            
            $tyre_array=json_encode($tyre_array);
            $tyre->sizes=$tyre_array;
            $tyre->save();
            
            return back()->with('status','Data Updated.');
            
        }
    }
    
    /**
     * Update the clone of specified resource in storage.
     */
    public function clone(Request $request, Tyre $tyre)
    {
            $new_tyre = $tyre->replicate();
            $new_tyre->slug = $tyre->slug.'-1';
            $new_tyre->created_at = Carbon::now();
            $new_tyre->save();

            $new_tyre->icons()->sync($tyre->icons);
            $new_tyre->tyre_categories()->sync($tyre->tyre_categories);
            return redirect()->route('admin.tyre.edit', [ 'tyre' =>$new_tyre->id]);
    }
    
    /**
     * Update the clone of specified resource in storage.
     */
    public function tyrereorder(Request $request)
    {
        $input_data=[
            'country'=>'',
            'brand'=>'',
            'searchtag'=>'',
        ];
        $tyres=[];

        $country=Country::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $brand=Brand::all()->pluck('name','id')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        $searchtag=SearchTag::all()->pluck('name','id');
        
        if($request->method()==='POST'){
            $input = $request->only(['country', 'brand', 'searchtag']);
            $input_data=[
                'country'=>$input['country'],
                'brand'=>$input['brand'],
                'searchtag'=>$input['searchtag']    ,
            ];
            $tyres=Tyre::where(['country_id'=>$input['country'],'brand_id'=>$input['brand'],'search_tag_id'=>$input['searchtag']])->orderBy('order')->pluck('name','id');
        }
        return view('admin.tyre.reorder',compact('country','brand','searchtag', 'input_data', 'tyres'));
        
    }

    /**
     * Update the size of specified resource in storage.
     */
    public function feature(Request $request, Tyre $tyre)
    {
        if($request->method()==='GET'){
            return view('admin.tyre.feature', compact('tyre'));
        }
        if($request->method()=='POST'|| $request->method()=='PUT'){
            $request->validate([
                'title' => ['array'],
                'title.*' => ['required','string','max:6024'],
                'description' => ['array'],
                'description.*' => ['required','string','max:6024'],
                'image' => ['array'],
                'image.*' => ['file','mimes:webp,jpg,png','max:6024'],
            ]);
            $f=json_decode($tyre->features_benifits,true);
            $req_f=[];
            foreach ($request->title as $key => $value) {
                $req_f[$key]['title']=htmlspecialchars($value);
                $req_f[$key]['description']=htmlspecialchars($request->description[$key]);
                if (isset($request->image) && !empty($request->image)) {
                    if(array_key_exists($key,$request->image)){
                        $req_f[$key]['image']=$this->handlefile($request->image[$key],$this->feature_path);
                    }else{
                        $req_f[$key]['image']=$f[$key]['image'];
                    }
                }else{
                    $req_f[$key]['image']=$f[$key]['image'];
                }                
            }
            //Update tyre
            $tyre_array=json_encode($req_f);
            $tyre->features_benifits=$tyre_array;
            $tyre->save();
            
            return back()->with('status','Data Updated.');
            
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tyre $tyre)
    {
        if($tyre->id){
            $tyre->icons()->detach();
            $tyre->tyre_categories()->detach();
            $tyre->delete();
            return redirect()->route('admin.tyre.index')->with('status','Tyre deleted');
        }
    }
    
    
}
