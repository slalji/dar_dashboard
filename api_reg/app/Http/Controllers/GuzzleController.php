<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\SelcomAPIClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class GuzzleController extends Controller {
    
    function index($id){
         
       $post = app('App\Http\Controllers\DocumentsController')->find($id)->first();
         
        $docs = app('App\Http\Controllers\DocumentsController')->selectAll();        
         
        return view('guzzle.index', compact('docs', 'post' )); 
    }
    
    function try(Request $request){

       /* echo '<pre>';
        die(print_r($request->request_body));
        echo '</pre>';*/
         
        $headers = [
            'Authorization' =>  $request->request_header,        
            'Accept'        => 'application/json',
        ];
        $client = new Client();       
        
        $options = [
            'body' => $request->request_body,
            'headers' => $headers
        ];
        $res = $client->post('http://10.20.0.2:8552/selcomapi', $options);

        echo '<pre>';
        var_dump($res);
        echo '</pre>';
    }
}
