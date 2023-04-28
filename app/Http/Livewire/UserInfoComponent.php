<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserInfoComponent extends Component
{

   

    public $name;
    public $lastName;
    public $bio;
    public $telephone;
    public $email;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'name' => 'required|unique:users',
            'lastName' => 'required|unique:users',
            'bio' => 'max:500',
            'email'=> 'required|email|unique:users',
            'telephone'=> 'required|size:10',
        ]);
    }

    public function mount(){
        $this->name=Auth()->user()->name;
        $this->lastName=Auth()->user()->lastName;
        $this->bio=Auth()->user()->bio;
        $this->telephone=Auth()->user()->telephone;
        $this->email=Auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.user-info-component');
    }

    public function SAUVEGARDE(){
       
        $current_user =User::findOrFail(Auth()->user()->id);
        $current_user->name=$this->name;
        $current_user->lastName=$this->lastName;
        $current_user->bio=$this->bio;
        $current_user->telephone=$this->telephone;
        $current_user->email=$this->email;
        $current_user->update();
        $this->dispatchBrowserEvent("user-info");


        
    }
}
