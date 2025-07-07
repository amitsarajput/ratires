<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Http\Controllers\XlsxController;
use ProductManager\Models\Country;
use ProductManager\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    private $headerkeys=[
        'sn','name','address','city','state','postal','country','countrycode','continent','featured','lat','lng','direciton','addresspreview','phone','phone2','email'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dealer=Dealer::all();
        //dd($continents);
        return view('ProductManager::admin.dealer.index', compact('dealer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        
        $continents=Country::all()->pluck('name','code')->map(function (string $item, string $key) {
            return strtoupper($item);
        });       
        return view('ProductManager::admin.dealer.create', compact('continents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['string'],
            'state' => ['string'],
            'country' => ['required', 'string'],
            'countrycode' => ['required', 'string', 'max:2'],
            'continent' => ['required', 'string', 'max:6'],
            'postal' => ['string'],
            'phone' => ['string'],
            'lat' => ['string'],
            'lng' => ['string'],
            'direciton' => ['string'],
            'email' => ['string','nullable'],
            'addresspreview' => ['required'],
        ]);

        $postdata=[
            'name' =>$request->name,
            'address' =>$request->address,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'countrycode' =>$request->countrycode,
            'continent' => $request->continent,
            'postal' =>$request->postal,
            'phone' =>$request->phone,
            'lat' =>$request->lat,
            'lng' =>$request->lng,
            'direciton' =>$request->direciton,
            'addresspreview' =>$request->addresspreview,
            'featured'=>0,
        ];
        if ($request->featured) { $postdata['featured']=1;}

        $dealer = Dealer::create([
            'name' => $postdata['name'],
            'countrycode' => $postdata['countrycode'],
            'continent' => $postdata['continent'],
            'postdata' => json_encode($postdata),
            'featured' =>  $postdata['featured'],
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dealer $dealer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dealer $dealer)
    {
        $id=$dealer->id;
        $dealer=json_decode($dealer->postdata,true);
        $continents=Country::all()->pluck('name','code')->map(function (string $item, string $key) {
            return strtoupper($item);
        });
        return view('ProductManager::admin.dealer.edit',compact('dealer','id','continents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dealer $dealer)
    {
        $request->validate([            
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['string'],
            'state' => ['string'],
            'country' => ['required', 'string'],
            'countrycode' => ['required', 'string', 'max:2'],
            'continent' => ['required', 'string', 'max:6'],
            'postal' => ['string'],
            'phone' => ['string'],
            'lat' => ['string'],
            'lng' => ['string'],
            'direciton' => ['string'],
            'email' => ['string','nullable'],
            'addresspreview' => ['required'],
        ]);

        $postdata=[
            'name' =>$request->name,
            'address' =>$request->address,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'countrycode' =>$request->countrycode,
            'continent' => $request->continent,
            'postal' =>$request->postal,
            'phone' =>$request->phone,
            'lat' =>$request->lat,
            'lng' =>$request->lng,
            'direciton' =>$request->direciton,
            'addresspreview' =>$request->addresspreview,
            'featured'=>0,
        ];
        if ($request->featured) { $postdata['featured']=1;}

        $dealer->update([
            'name' => $postdata['name'],
            'countrycode' => $postdata['countrycode'],
            'continent' => $postdata['continent'],
            'postdata' => json_encode($postdata),
            'featured' =>  $postdata['featured'],
        ]);

        return redirect()->back();
    }

    /**
     * Update in bulk.
     */
    public function bulkadd(Request $request)
    {
        if($request->method()==='GET'){
            $old_file='no-file.xlsx';
            //Grab Data
            $alldealers=Dealer::all()->map(function (Dealer $dealer) {
                return json_decode($dealer->postdata,true);
            });
            //Export old data to file
            $old_file=XlsxController::createfile($alldealers, $this->headerkeys,'dealers','dealers');
            //Load view
            return view('ProductManager::admin.dealer.bulk-add',compact('old_file'));
        }
        if($request->method()=='POST'|| $request->method()=='PUT'){
            $request->validate([
                'dealers' => ['file','mimes:xlsx','max:6024'],
            ]);
            if ($request->hasFile('dealers')&& $request->file('dealers')->isValid()) {
                $olddealer=Dealer::all()->toArray();
                $dealers=XlsxController::readxlfile($request->dealers, 'dealers');
                //dd($dealers);
                if ($request->rmdlexist ) { 
                    Dealer::truncate(); //Delete all models
                }
                foreach($dealers as $dealer){
                    Dealer::create([
                        'name' => $dealer['name'],
                        'countrycode' => $dealer['countrycode']??'-',
                        'continent' => $dealer['continent']??'-',
                        'postdata' => json_encode($dealer),
                        'featured' =>  $dealer['featured'],
                    ]);
                }

            }
            return back()->with('status','Data Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dealer $dealer)
    {
        if($dealer->id){
            $dealer->delete();
            return redirect()->route('ProductManager::admin.dealer.index')->with('status','Dealer deleted');
        }
    }
}
