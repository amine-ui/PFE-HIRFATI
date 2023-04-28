<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserSettingsComponent extends Component
{

    use WithFileUploads;

 
    public $image;


    public function updatedPhoto()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }


    public function render()
    {
        return view('livewire.user-settings-component');
    }

    

    public function SAUVEGARDE(){
        
        $old_user_image=Auth()->user()->image;
        if (empty($this->image)) {
            $profile_image =$old_user_image;
            return;
        }
        else{
            $profile_image=$this->image->store("profile", "public");
        }
        $current_user =User::findOrFail(Auth()->user()->id);
        $current_user->image=$profile_image;
        $current_user->update();
        if($old_user_image !="profile/user.png"){
            unlink("storage/".$old_user_image);
            $this->dispatchBrowserEvent("user-image");
        }
        
    }
}
