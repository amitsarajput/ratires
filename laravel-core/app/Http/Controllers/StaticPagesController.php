<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StaticPagesController extends Controller
{
    private $data=[];

    // Get path without the country 
    public function get_request_path($request, $country){
        if($country !== null){
            $segments=explode('/',$request->path());
            array_shift($segments);
            $request_path=implode('/',$segments);
        }else{
            $request_path=$request->path();
        }
        return $request_path;
        
    }
    public function index(Request $request, $country=null){
        //print_r('StaticPagesController');
        //$request->fullUrl(); $request->path(); $request->root();

        $request_path=$this->get_request_path($request, $country);
        
        //dd($country,$request_path);
        $this->data=[];
        if ($request_path==='about-us') {
            $this->data['page']=$request_path;
        }
        if ($request_path==='why-radar') {
            $this->data['page']=$request_path;
        }
        if ($request_path==='dealer-locator') {
            $this->data['page']=$request_path;
        }
        if ($request_path==='contact-us') {
            $this->data['page']='contact';
        }
        if ($request_path === 'warranty') {
            $this->data['page'] = $country=='apac'?'warranty-radar-apac':'warranty-radar-us';
        }
        if ($request_path === 'premium-collection') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'ceo-message') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'testing') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'privacy-policy') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'red-partner') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'environmental-responsibility') {
            $this->data['page'] = 'responsibility-environmental';
        }
        if ($request_path === 'social-responsibility') {
            $this->data['page'] = 'responsibility-social';
        }
        if ($request_path === 'new-european-tyre-labeling') {
            if ($country=='eu') {
                $this->data['page'] = $request_path;
            }else{
                abort(404);  
            }
        }

        if ($request_path === 'real-people-group') {
            $this->data['page'] = $request_path;
        }
        if ($request_path === 'olli-seppala') {
            $this->data['page'] = 'real-people--olli-sipala';
        }
        if ($request_path === 'stephane-clepkens') {
            $this->data['page'] = 'real-people--stephane-clepkens';
        }
        if ($request_path === 'fabrizio-giugiaro') {
            $this->data['page'] = 'real-people--fabrizio-giugiaro';
        }

        if (View::exists('pages/'.$this->data['page'])) {
            return view('pages/' . $this->data['page'], ['data'=>$this->data]);
        }else {
            abort(404);

        }
    }
    public function landingpage(Request $request,  ?string $country=null){
        //dd($request->path());
        
        $request_path=$this->get_request_path($request, $country);
        if ($request_path==='radar/eu-renegade-x') {
            $this->data['page']='eu-renegade-x';
        }
        return view('landingpage/' . $this->data['page'], ['data'=>$this->data]);
    }
}
