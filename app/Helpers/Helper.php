<?php

namespace App\Helpers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Helper
{
  public static function IDGenerator($model, $trow, $length = 4, $prefix){
      $data = $model::orderBy('id','desc')->first();
      if(!$data){
          $og_length = $length;
          $last_number ='';
      }else{
          $code = substr($data->$trow,strlen($prefix)+1);
          $actial_last_number = ($code/1)*1;
          $increment_last_number = $actial_last_number+1;
          $last_number_length = strlen($increment_last_number);
          $og_length= $length-$last_number_length;
          $last_number= $increment_last_number;
      }
      $zeros = '';
      for($i=0;$i<$og_length;$i++){
          $zeros.='0';
      }
      return $prefix.'-'.$zeros.$last_number;
  }
    public function sendSMS($recipient, $message)
    {
        $apiKey = config('app.sms_api_key');;
        $senderId = config('app.sender_id');

        $client = new Client();
        try {
            $fullURL = "https://api.mobilesasa.com/v1/send/message";

            $body = [
                "senderID" => $senderId,
                "phone" => $recipient,
                "message" => $message,
            ];

            $res = $client->post($fullURL, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json'
                ],
                'json' => $body
            ]);

            $response = json_decode($res->getBody(), TRUE);
            // \Illuminate\Support\Facades\Log::info(json_encode($response));
            // $smsCode = $response['messageID'][0];

        } catch (GuzzleException $e) {
        }

        return json_encode($response ?? []);
    }
}

