<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AjaxHandlerController extends Controller
{
    protected $key_scope=['omnidata.dealerform_open'];
    
    public function __construct()
    {
        $this->middleware('auth')->except(['get_session_data','set_session_data']);
    }
    public function handle_request(Request $request, string $table){
        //dd($request);
        $metadata=$request->metadata;
        if($metadata['action']==='reorder-tyre'){
            $formdata=$request->formdata;
            foreach($formdata as $key=>$value){
                $record = DB::table($metadata['table'])->where('id', $value)->update([$metadata['column'] => $key]); 
            }
            return response(['success' => 'Updated']);
        }
        elseif($metadata['action']==='reorder-product-images'){
            $record = DB::table($metadata['table'])->where('id', $metadata['id'])->update([$metadata['column'] => json_encode($request->formdata)]);
            return response(['success' => 'Updated']);
        }
        elseif($metadata['action']==='publish'){
            $record = DB::table($metadata['table'])->where('id', $metadata['id'])->update([$metadata['column'] => $request->formdata]);
            return response(['message' => $record, 'value'=>$request->formdata]);
        }
    }

    function get_session_data($key){
        $result=false;
        if ( in_array($key,$this->key_scope) ) {
            $result = session($key);
        }
        return $result;
    }
    function set_session_data(Request $request,$key){
        $result=false;
        $value=$request->formdata;
        if ( in_array($key,$this->key_scope) ) {
            session([$key => $value]);
            $result =session($key);
        }
        return $result;
    }
}
