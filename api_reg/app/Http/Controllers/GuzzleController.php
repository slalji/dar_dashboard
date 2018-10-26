<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\SelcomAPIClient;

class GuzzleController extends Controller {
    
    function index(){
         
        $api_key = 'YTlPQqZtwB82cgF2';
        $email = 'shahroze.nawaz@cloudways.com';
        $selcom_api = new SelcomAPIClient($email,$api_key);
        $servers = $selcom_api->get_servers();
        echo '<pre>';
        var_dump($servers);
        echo '</pre>';
    }
}
