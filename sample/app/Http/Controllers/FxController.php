<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FxController extends Controller
{
    //
    public function index(){
        return view("FX.index");
    }

    public function index_test(){
        return view("FX.index2");
    }

    public function rateData(Request $request){
        $apikey = config("custom.iex_api_key");
        $symbol = $request->input("symbol");
        $url = "https://cloud.iexapis.com/stable/fx/latest?symbols=" . $symbol . "&token=" . $apikey;
        // dd($url);
        $json = file_get_contents($url);
        // dd($json);
        if($json !== false){
            echo $json;
        }else{
            echo json_encode([ "status" => "error","server_response" => $http_response_header[0]]);
        }
    }
}
