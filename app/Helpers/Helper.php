<?php

namespace App\Helpers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Carbon\Carbon;
use App\Helpers\Helper as Otp;
use Ichtrojan\Otp\Models\Otp as Model;
use Illuminate\Support\Facades\Facade;

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

    protected static function getFacadeAccessor()
    {
        return 'Otp';
    }
    public function generate(string $identifier, int $digits = 4, int $validity = 10) : object
    {
        Model::where('identifier', $identifier)->where('valid', true)->delete();

        $token = str_pad((new Otp)->generatePin(), 4, '0', STR_PAD_LEFT);

        if ($digits == 5) $token = str_pad((new Otp)->generatePin(5), 5, '0', STR_PAD_LEFT);

        if ($digits == 6) $token = str_pad((new Otp)->generatePin(6), 6, '0', STR_PAD_LEFT);

        Model::create([
            'identifier' => $identifier,
            'token' => $token,
            'validity' => $validity
        ]);

        return (object)[
            'status' => true,
            'token' => $token,
            'message' => 'OTP generated'
        ];
    }

    /**
     * @param string $identifier
     * @param string $token
     * @return mixed
     */
    public function validate(string $identifier, string $token) : object
    {
        $otp = Model::where('identifier', $identifier)->where('token', $token)->first();

        if ($otp == null) {
            return (object)[
                'status' => false,
                'message' => 'OTP does not exist'
            ];
        } else {
            if ($otp->valid == true) {
                $carbon = new Carbon;
                $now = $carbon->now();
                $validity = $otp->created_at->addMinutes($otp->validity);

                if (strtotime($validity) < strtotime($now)) {
                    $otp->valid = false;
                    $otp->save();

                    return (object)[
                        'status' => false,
                        'message' => 'OTP Expired'
                    ];
                } else {
                    $otp->valid = false;
                    $otp->save();

                    return (object)[
                        'status' => true,
                        'message' => 'OTP is valid'
                    ];
                }
            } else {
                return (object)[
                    'status' => false,
                    'message' => 'OTP is not valid'
                ];
            }
        }
    }

    /**
     * @param int $digits
     * @return string
     */
    private function generatePin($digits = 4)
    {
        $i = 0;
        $pin = "";

        while ($i < $digits) {
            $pin .= mt_rand(0, 9);
            $i++;
        }

        return $pin;
    }
}

