<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Device;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store()
    {
        return ['test' => 'response'];
        return Http::get('https://jsonplaceholder.typicode.com/posts');

            // $device = Device::where('client_token', $request->client_token)->first();
            // $system_os = $device->system_os ?? "ANDROID";
             
            // return response()->json($system_os, 201); 
            
            // $verify_response = ($system_os == "IOS") 
            //     ? $this->ios_verify($request->receipt) : $this->google_verify($request->receipt);
            // $verify_response = route()
        //    $verify_response = Http::post('http://localhost:8000/api/verify_google');

            // $result = $verify_response->json();
            //print_r($result['ccccccc']);
            // $verify_response = ['book'];
            // $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            //     'name' => 'Sara',
            //     'role' => 'Privacy Consultant',     
            // ]);
            
            
            // return response()->json($response, 201);

            // if (isset($verify_response->status)) {
            //     $request->request->add(['purchase_date' => date('Y-m-d H:s:i')]);
            //     $request->request->add(['status' => $verify_response->status]);
            //     $request->request->add(['expiry_date' => $verify_response->expiry_date]);
            //     $purchase = Purchase::create($request->all());
            //     return response()->json($purchase, 201);
            // } else {
            //     return response()->json(["error"=> "Invalid Client Token"], 201);
            // }
        // } else {
        //     return response()->json(["error"=> "Invalid Client Token"], 201);
        // }
    }

    public function verify_google() {
        return response()->json(["ccccccc"=> "kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk"], 201);
    }

    public function google_verify($receipt) 
    {
        Http::fake();
        $response = Http::get([
            'google.com/google-app-verify/'.$receipt => Http::response([
                'status' => substr($receipt, -1) % 2 == 0 ? true : false, 
                'expiry_date' => date('Y-m-d H:s:i')
            ], 200, ['Headers'])
        ]);
    }

    public function ios_verify($receipt) 
    {
        $response = Http::fake([
            'google.com/google-app-verify/'.$receipt => Http::response([
                'status' => substr($receipt, -1) % 2 == 0 ? true : false, 
                'expiry_date' => date('Y-m-d H:s:i')
            ], 200, ['Headers'])
        ]);
        return $response;
    }
}
