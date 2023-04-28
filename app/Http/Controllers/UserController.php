<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Uses;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class UserController extends Controller
{
    //switch 
    public function switch(){
        $user_id=Auth()->user()->id;
        $current_user=User::find($user_id);
        $current_user->isArtisan = true;
        $current_user->save();
        return to_route('Home');
    }

    public function todashboard(){
        return redirect('dashbord')-> with("from","add");
    }

    public function show(User $user){
        
    }

    public function update(Request $request){
        $user = User::find( Auth()->user()->id);
        $user->name=$request->name;
        $user->lastName=$request->lastName;
        $user->telephone=$request->telephone;
        $user->email=$request->email;
        $user->bio=$request->bio;
        $user->update();
        return to_route("user.dashbord")->with("message","information bien modifie");
    }
}
