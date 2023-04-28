<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;


class EditComponent extends Component
{

    use WithFileUploads;
    


    public $service;
    public $categories;
    public $title ;
    public $location;
    public $description;
    public $price;
    public $category;
    public $images;
    

    public function updatedPhoto()
    {
        $this->validate([
            'images' => 'image|max:1024', 
            'images.*' => 'image|max:1024', 
        ]);
    }

    public function render()
    {
        
        return view('livewire.edit-component');        
    }

    public function edit(Service $service)
    {   
        $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();

        return view("service.edit",compact('service','categories'));
        
    }

    public function mount($service , $categories){
        $this->service = $service;
        $this->categories=$categories;
        $this->title=$service->title;
        $this->location=$service->location;
        $this->category=$service->category_id;
        $this->description=$service->description;
        $this->price=$service->price;
    }
    

    public function update(){
        $currentservice=Service::findOrFail($this->service->id);
        $oldimages=explode(",",$currentservice->images);
         $newimages="";
        if (empty($this->images)) {
            
            $currentservice->title=$this->title;
            $currentservice->location=$this->location;
            $currentservice->description=$this->description;
            $currentservice->price=$this->price;
            $currentservice->category_id=$this->category;
            $currentservice->images=implode(",",$oldimages);
            $currentservice->update();

           
        }else{

            foreach ($this->images as $image ) {
                $image_path=$image->store("services", "public");  
                $images[]= $image_path;
                $newimages = implode(",",$images);
            }
          

            
            $currentservice->title=$this->title;
            $currentservice->location=$this->location;
            $currentservice->description=$this->description;
            $currentservice->price=$this->price;
            $currentservice->category_id=$this->category;
            $currentservice->images= $newimages;
            $currentservice->update();
            
            foreach ($oldimages as  $oldimage) {
                unlink("storage/".$oldimage);
            }
           
        }
 
        $this->dispatchBrowserEvent("service-updated");
        return to_route("service.show",[$currentservice]);
        

    }


    // function for remove upload images 

    public function removetempimage($index){
      
        array_splice($this->images,$index,1);


    }
}
