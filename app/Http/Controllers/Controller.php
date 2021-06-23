<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\File; 

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public const DELETE = 'delete';

    // Response Store
    public function responseSuccessStore($module, $data = null)
    {
        return response()->json(['status' => 'success', 'message' => $module.' created successfully', 'data' => $data]);
    }
    
    // Response Delete
    public function responseSuccessDelete($module)
    {
        return response()->json(['status' => 'success', 'message' => $module.' delete successfully']);
    }

    // Response Update
    public function responseSuccessUpdate($module, $data = null)
    {
        return response()->json(['status' => 'success', 'message' => $module.' update successfully', 'data' => $data]);
    }
    
    // Global Fail
    public function responseFail($message)
    {
        return response()->json(['status' => 'error', 'message' => $message]);
    }

    public function responseFailDebug($message, $line)
    {
        return response()->json(['status' => 'error', 'message' => $message, 'line' => $line]);
    }

}
