<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;


class AuthController extends Controller
{
    public function _login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Check if field is not Empty
        if (empty($email) OR empty($password)) {
            return response()->json(['status' => 'error', 'message' => 'You must fill all the Fields']);
        }

        $client = new Client();

        try {
            $data = $client->request('POST', config('service.passport.login_endpoint'), [
                'verify' => false,
                'form_params' => array(
                    'client_secret' => config('service.passport.client_secret'),
                    'grant_type'    => 'password',
                    'client_id'     => config('service.passport.client_id'),
                    'username'      => $request->email,
                    'password'      => $request->password
                )
            ]);
            return json_decode($data->getBody(), true);
        } catch (\GuzzleHttp\Exception\BadResponseException $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
        
    }

    public function _logout(Request $request)
    {
        try {
            auth()->user()->tokens()->each(function ($token)
            {
                $token->delete();
            });
            return response()->json(['status' => 'success', 'message' => 'Logged Out Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
