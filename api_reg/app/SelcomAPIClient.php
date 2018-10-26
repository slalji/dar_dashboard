<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;


class SelcomAPIClient extends Model
{
    private $client = null;
    const API_URL = 'http://10.20.0.2:8552/selcom_api/index.php?';
    var $auth_key;
    var $auth_email;
    var $accessToken;

    public function __construct($email,$key)
    {
        $this->auth_email = $email;
        $this->auth_key = $key;
        $this->client = new \GuzzleHttp\Client();
       
    }
 
 
    public function prepare_access_token()
    {
        try{
            $url = self::API_URL . '/oauth/access_token';
            $data = ['email' => $this->auth_email,'api_key' => $this->auth_key];
            /*$response = $this->client->post($url, ['query' => $data]);
            $result = json_decode($response->getBody()->getContents());
            $this->accessToken = $result->access_token;
            */
            $this->accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImtpZCI6eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsImlzcyI6IlNlbGNvbSBBUEkifX0.eyJpc3MiOiJTZWxjb20gQVBJIiwidGltZXN0YW1wIjoiMjAxOC0wNy0wNiAxMjoxNDozMyIsIm1ldGhvZCI6InBheVV0aWxpdHkiLCJyZXF1ZXN0UGFyYW1zIjp7InRyYW5zaWQiOiIwMTA1MjAxODE2MTAyMTAiLCJtc2lzZG4iOiIyNTU3ODk2NTQ3MDAiLCJ1dGlsaXR5Y29kZSI6IkFaQU1UViIsInV0aWxpdHlyZWYiOiIyNTU3ODk2NTQ1NTUiLCJhbW91bnQiOiIxMCJ9fQ.PTJBg0M7ejfsaUsFlsLLr45NCu-mAjS5JH3MIUnDdo8';
        }
        
        catch (RequestException $e){
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function StatusCodeHandling($e){

        if ($e->getResponse()->getStatusCode() == '400')
            $this->prepare_access_token();
            
        elseif ($e->getResponse()->getStatusCode() == '422')
            {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
            }
        elseif ($e->getResponse()->getStatusCode() == '500')
            {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
            }
        elseif ($e->getResponse()->getStatusCode() == '401')
            {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
            }
        elseif ($e->getResponse()->getStatusCode() == '403')
            {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
            }
        else
            {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
            }
        }
    public function get_servers(){

        try {
            
            $url = self::API_URL . 'key='.$this->auth_key;
            
            $option = array('exceptions' => false);
            $headers = array('Authorization'=>'Bearer ' . $this->accessToken);
            $body = '{
                 "timestamp": "2018-10-24T10:30:00+00:00",
                "method": "changeCardStatus",
                "requestParams": {
                  "transid":   "1540366243",
                  "statustxt": "open",
                  "accountNo": "PALMPAY10"
                  
                }
              }';
            //$response = $this->client->post($url, [‘query’ => $data]);
            //$response = $this->client->post($url, array('headers' => $header,'json' =>$data));
             
//$request = new Request('HEAD', 'http://httpbin.org/head', $headers, $body);
            $response = $this->client->post($url, $headers, $body);
            $result = $response->getBody()->getContents();
             return $result;
            
        }
        catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
    }
}
