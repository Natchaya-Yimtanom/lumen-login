<?php

namespace Quinn\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Quinn\Login\Login;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $user = Login::where('username', $request->username)
        ->first();
        if (!empty($user) && Hash::check($request->password, $user->password)) {
            
            return $this->responseRequestSuccess($user);
        } else {
            return $this->responseRequestError("Username or password is incorrect");
        }
    }

    public function register(Request $request)
    {
        $user = new Login();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return $this->responseRequestSuccess($user);
        } else {
            return $this->responseRequestError('Cannot register');
        }
    }

    protected function responseRequestSuccess($ret)
    {
        return response()->json(['status' => 'success', 'data' => $ret], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function responseRequestError($message = 'Bad request', $statusCode = 200)
    {
        return response()->json(['status' => 'error', 'error' => $message], $statusCode)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
