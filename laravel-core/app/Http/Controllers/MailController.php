<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\GenricMail;

class MailController extends Controller
{
    public function genric_mail(){
        $mailData=[
            "subject"=>"This is test.",
            "name"=>"Amit",
            'vala'=>'kumar'
        ];
        try{
            Mail::to(['mini.p@diginet.sg'])->send(new GenricMail($mailData));
            // ,'Sayeed@omni-united.com ','amit@lopamudracreative.com'
        }
        catch(\Exception $e){
            dd($e);
        }
        
    }
}
