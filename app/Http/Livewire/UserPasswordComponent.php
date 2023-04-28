<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserPasswordComponent extends Component
{

    public $currentpassword;
    public $newpassword;
    public $confirm_newpassword;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'newpassword' => ['required','min:8'
            ,
            [
                'newpassword.required' => 'donnée nouveau mot de passe .',
              
            ], [
                'newpassword.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            ]
        
        ],
            'confirm_newpassword' => ['required','same:newpassword',[
                'confirm_newpassword.required' => 'La confirmation du mot de passe est requise.',
                'confirm_newpassword.same' => 'Le mot de passe de confirmation ne correspond pas au nouveau mot de passe.',
            ]],

            'currentpassword' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth()->user()->password)) { return $fail(__('mot de passe incorrect .')); }
            },[
                "currentpassword.required"=> 'L\'ancien mot de passe obligatoire.'
            ]],
            
        ]);
    }
    public function render()
    {
        return view('livewire.user-password-component');
    }

    public function SAUVEGARDE(){

        $currentuser=User::findOrFail(Auth()->user()->id);
        if($this->newpassword==$this->confirm_newpassword){
             $currentuser->password=Hash::make($this->newpassword);
             $currentuser->update();

            $this->dispatchBrowserEvent("user-password");
            
            $this->currentpassword="";
            $this->newpassword="";
            $this->confirm_newpassword="";
        }else{
            return;
        }
       

        
    }
}
