<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiHandlerController extends Controller
{
// ------------ [ Get request ] ------------

    public function getUsers() {
     $response = Http::get("https://jsonplaceholder.typicode.com/users");
     $response = json_decode($response, false);
//     var_dump($response);
     foreach ($response as $resp => $data) {
         dump($data->name);
     }
//     return response()->json(["status" => "success", "count" => count($response), "data" => $response]);
    }
}
