<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
        
        //Google callback  
        public function handleGoogleCallback(){
        
        $user = Socialite::driver('google')->user();
          $this->_registerorLoginUser($user);
          return redirect()->route('Home');
        }


        protected function _registerOrLoginUser($data){
            $user = User::where('email',$data->email)->first();
              if(!$user){
                 $user = new User();
                 $user->name = $data->name;
                 $user->lastName = $data->family_name;
                 $user->email = $data->email;
                 $user->password =Hash::make("12345678");
                 $user->save();
              }
            Auth::login($user);
            }
}
