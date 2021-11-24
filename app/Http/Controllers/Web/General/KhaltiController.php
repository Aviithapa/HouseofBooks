<?php


namespace App\Http\Controllers\Web\General;


use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;

class KhaltiController extends BaseController
{
    public function verifyPayment(Request $request)
    {

        $token = $request->token;

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => 1000
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $headers = ["Authorization: Key test_secret_key_1f6cd432ed3f40e5845c7d77163721e3"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;

    }

    public function storePayment(Request $request)
    {
        // $response = $request->response;
        // store the data to database here
        return response()->noContent();
    }

}
