<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\SelcomAPIClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class GuzzleController extends Controller {
    
    function index($id){
         
       /* $post = app('App\Http\Controllers\DocumentsController')->find($id)->first();
         
        $docs = app('App\Http\Controllers\DocumentsController')->selectAll();        
         
        return view('guzzle.index', compact('docs', 'post' ));*/
    }
    
    function try(){
         
        $client = new Client();
        $res = $client->request('GET', 'http://192.168.1.14:7300/Selcom/request', [
            'auth' => ['user', 'pass']
        ]);
        echo '<pre>';
        var_dump($res);
        echo '</pre>';
    }
}
