<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller {

    public $successStatus = 200;


    public function login() {

        /*
         * Attempting Authentication
         */

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

            $user = Auth::user();

            /*
             * Creating Access Token
             */

            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response([
                'status' => 'success',
                'user' => $user,
                'accessToken' => $accessToken
            ]);

        }

        else{

            return response()->json(['status'=>'unauthorised']);

        }
    }


    public function register(Request $request) {

        /*
         * Validating Information
         */

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);


        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'status' => 'success',
            'user' => $user,
            'accessToken' => $accessToken
        ]);
    }


    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

}
