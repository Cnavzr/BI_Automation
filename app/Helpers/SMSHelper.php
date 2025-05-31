<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class SMSHelper
{
    public static function sendSms($to,$msg){
        $data=array(
            'username' =>"atiehertebat",
            'password'=>"vO814D%|r.,E",
            'to' =>$to,
            'from' => "1000333111",
            "text" =>$msg
        );
        $post_data = http_build_query($data);
        $handle = curl_init('https://rest.payamak-panel.com/api/SendSMS/SendSMS');
        curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'content-type' => 'application/x-www-form-urlencoded'
        ));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        $response = curl_exec($handle);
        return $response;
    }

}
