<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaPaymentController extends Controller
{
    public function getAccessToken()
    {
        $url = config('mpesa_env') == 0
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => config('mpesa_consumer_key') . ':' . config('mpesa_consumer_secret')
            )
        );
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        // return $response;
        return $response->access_token;
    }

    /**
     * Register URL
     */
    public function registerURLS()
    {
        $body = array(
            'ShortCode' => config('mpesa_shortcode'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => config('mpesa_test_url') . '/api/confirmation',
            'ValidationURL' => config('mpesa_test_url') . '/api/validation'
        );

        $url = '/c2b/v1/registerurl';
        $response = $this->makeHttp($url, $body);

        return $response;
    }

    public function stkPush(Request $request)
    {
        $timestamp = date('YmdHis');
        $password = config('mpesa_stk_shortcode').config('mpesa_passkey').$timestamp;

        $curl_post_data = array(
            'BusinessShortCode' => config('mpesa_stk_shortcode'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => '1',
            'PartyA' => '600991',
            'PartyB' => config('mpesa_stk_shortcode'),
            'PhoneNumber' => '254700814223',
            'CallBackURL' => config('mpesa_test_url'). '/api/stkpush',
            'AccountReference' => 'CHAMAYETU',
            'TransactionDesc' => 'CHAMAYETU'
        );

        $url = '/stkpush/v1/processrequest';

        $response = $this->makeHttp($url, $curl_post_data);

        return $response;
    }

    /**
     * Simulate Transaction
     */
    public function simulateTransaction(Request $request)
    {
        $body = array(
            'ShortCode' => config('mpesa_shortcode'),
            'Msisdn' => '254708374149',
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );

        $url =  '/c2b/v1/simulate';
        $response = $this->makeHttp($url, $body);

        return $response;
    }

    public function makeHttp($url, $body)
    {
        // $url = 'https://mpesa-reflector.herokuapp.com' . $url;
        $url = 'https://sandbox.safaricom.co.ke/mpesa/' . $url;
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CurlOPT_url => $url,
                CurlOPT_HTTPHEADER => array('Content-Type:application/json','Authorization:Bearer '. $this->getAccessToken()),
                CurlOPT_RETURNTRANSFER => true,
                CurlOPT_POST => true,
                CurlOPT_POSTFIELDS => json_encode($body)
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }
}
