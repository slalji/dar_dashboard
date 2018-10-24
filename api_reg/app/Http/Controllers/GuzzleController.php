<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GuzzleController extends Controller
{
    public function __construct()
    {
         
    }
    public function postGuzzleRequest()

    {
       

$client = new Client();
$url = "http://127.0.0.1/selcom_api/index.php?key=YTlPQqZtwB82cgF2";
$response = $client->post($url, [
    GuzzleHttp\RequestOptions::JSON => ['foo' => 'bar']
]);

        /*$client = \GuzzleHttp\ClientInterface();

     

        $myBody['name'] = "Demo";

        $request = $client->post($url,  ['body'=>$myBody],['headers' => [
            'Content-Type' => 'application/json', 'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImtpZCI6eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImlzcyI6IlNlbGNvbSBBUEkifX0.eyJpc3MiOiJTZWxjb20gQVBJIiwidGltZXN0YW1wIjoiMjAxOC0wNy0wNiAxMjoxNDozMyIsIm1ldGhvZCI6InBheVV0aWxpdHkiLCJyZXF1ZXN0UGFyYW1zIjp7InRyYW5zaWQiOiIwMTA1MjAxODE2MTAyMTAiLCJtc2lzZG4iOiIyNTU3ODk2NTQ3MDAiLCJ1dGlsaXR5Y29kZSI6IkFaQU1UViIsInV0aWxpdHlyZWYiOiIyNTU3ODk2NTQ1NTUiLCJhbW91bnQiOiIxMCJ9fQ.PTJBg0M7ejfsaUsFlsLLr45NCu-mAjS5JH3MIUnDdo8'
          ]]);

        $response = $request->send();
        */
        $body = $response->getBody();
print_r(json_decode((string) $body));



        dd($response);

    }
}
