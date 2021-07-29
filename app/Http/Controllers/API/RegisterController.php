<?php

namespace App\Http\Controllers\API;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validation Error',$validator->errors());
        }
        $input = $request->all();
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User register successfully.');

    }
    public function login(Request $request){
        if (Auth::attempt([
            'email'=>$request['email'],
            'password'=>$request['password'],
        ])){

            $user= Auth::user();
            $success=[];
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User  successfully.');
        }else{
            return $this->sendError(['error'=>'This User does not exist'],203);
        }
    }
}
