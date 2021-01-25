<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Device;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $request->request->add(['client_token' => $this->generateToken()]);
        $device = Device::create($request->all());
        return response()->json($device, 201);
    }

    private static function generateToken()
    {
        //return str_random(60);
        return Str::random(60);
    }
}
