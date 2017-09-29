<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    // public function index()
    // {
    //     //
    // }

    public function register(Request $request){
        $user=$this->user->create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
            ]);
        return response()->json(['status'=>true,'message'=>'user Created Succesfully','data'=>$user]);

    }

    public function login(Request $request){
        $credentials=$request->only('email','password');
        // dd($credentials);
        $token=null;
        // dd($token); 
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                dd(JWTAuth::attempt($credentials));
                return response()->json(['invalid_email_or_password'],422);

            }
        }
        catch(JWTAuthException $e){
            return response()->json(['status'=>'failed_create_token'],500);
        }

        return response()->json(compact('token'));
    }

    public function getAuthUser(Request $request){
        $user=JWTAuth::toUser($request->token);
        return response()->json(['result'=>$user]);
    }
   
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
