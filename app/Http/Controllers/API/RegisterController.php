<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    	$input = $request->all();
    	$input["password"] = bcrypt($input["password"]);
    	$user = User::create($input);
    	$success['token'] = $user->createToken('myapp')->accessToken;
    	$success['name'] = $user->name;

    	if($success){
    		return $response["status"] = "success";
    	}else{
    		return $response["status"] = "failure";
    	}
    }
}
