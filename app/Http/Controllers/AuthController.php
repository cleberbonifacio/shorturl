<?php
namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller{

  //Login User
  public function login(Request $request){

    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if( auth()->attempt($credentials) ){
        $user = Auth::user();
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success' => $success], 200);
    } else {
        return response()->json(['error'=>'Unauthorised'], 401);
    }
  }

  //Register User
  public function register(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'password_confirmation' => 'required|same:password',
    ]);

    if ($validator->fails()) {
      return response()->json([ 'error'=> $validator->errors() ]);
    }

    $data = $request->all();

    $data['password'] = Hash::make($data['password']);

    //Create user
    $user = User::create($data);
    $success['msg'] =  'Cadastro realizado com sucesso.';
    $success['token'] =  $user->createToken('AppName')->accessToken;

    return response()->json(['success'=>$success], 200);

  }

  //Details User
  public function user_detail(){
    $user = Auth::user();
    return response()->json(['success' => $user], 200);
  }

}
?>
