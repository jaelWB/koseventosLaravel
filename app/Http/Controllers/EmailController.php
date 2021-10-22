<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Illuminate\Support\Facades\Validator;



class EmailController extends Controller
{
    public static  function emailenviar( $html,$data, $subject, $to, $ccToFrom = array(), &$result = NULL ) {
      
        if (str_contains($to, ',')) {
            $mails = explode(',',$to);
            $to = $mails[0];
            $cc = array();
            for ($i=1; $i <count($mails) ; $i++) { 
                array_push($cc,$mails[$i]);
            }
            // dd($cc);
             Mail::send($html,$data,function($msj) use($subject,$to,$cc){
                $msj->from("info@ekoseventos.com","EKos Eventos en Vivo");
                $msj->subject($subject);
                $msj->to($to);
                $msj->cc($cc);
            });
            return true;
        }else{
             Mail::send($html,$data,function($msj) use($subject,$to){
                $msj->from("info@ekoseventos.com","EKos Eventos en Vivo");
                $msj->subject($subject);
                $msj->to($to);
            });
            return true;
        }
        
        


    }


    public static function emailUserAccount($user, $subject = "Acceso a Ekos Eventos En Vivo", $password){
     
        if(!empty($user)){
           
            $for = $user->email;
            
            if(self::emailenviar('emails.emailUserAccount',['user'=>$user, 'subject'=>$subject, 'password'=>$password], $subject, $for) ==true){
                return true;

            }
        }
    }

}
