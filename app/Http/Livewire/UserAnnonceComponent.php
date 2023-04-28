<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UserAnnonceComponent extends Component
{

    protected $listeners = ['delete'];
    public $delete_id;

    public function render()
    {
        $services = User::withCount('services')
                    ->with('services')
                    ->find(Auth::user()->id )
                    ->services()
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('livewire.user-annonce-component',compact('services'));
    }

    public function edit(Service $service)
    {   
        $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();
        return view("service.edit",compact('service','categories'));
    }

    public function deleteConfirmation( $service_id){
        $this->delete_id=$service_id;
        $this->dispatchBrowserEvent("show-delete-confirmation");

    }

    public function delete()
    {
        $service=Service::find($this->delete_id);
        $service->delete();
        $images = explode(',', $service->images);
        foreach ($images as $image) {
             unlink("storage/".$image);
        }
        $this->dispatchBrowserEvent("service-deleted");
    }


}
