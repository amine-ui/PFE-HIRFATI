<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;



class NewServiceComponent extends Component
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

            

    // //validation 
    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName,[
    //         'images' => 'required',
    //         'images.*' => 'mimes:jpeg,jpg,png|max:2048',
    //         'title' => 'required|max:255|unique:services',
    //         'description' => 'required|max:500',
    //         'category'=> 'required',
    //         'location'=> 'required',
    //         'price'=> 'required',
    //     ]);
    // }



    // for initialaze variables
    public function mount( $categories){
        $this->categories=$categories;
    }


    public function render()
    {
        return view('livewire.new-service-component');
    }

    // add new service
    public function store()
    {
        $validatedData = $this->validate([ 
            'images' => 'required|max:1024',
            'images.*' => 'mimes:jpeg,jpg,png|max:1024',
            'title' => 'required|max:255|unique:services',
            'description' => 'required',
            'category'=> 'required',
            'location'=> 'required',
            'price'=> 'required',
        ],[
            'images.required' => 'Le champ images est obligatoire.',
            'images.max' => 'La taille maximale des images est de :max kilo-octets.',
            'images.*.mimes' => 'Les images doivent être au format jpeg, jpg ou png.',
            'images.*.max' => 'La taille maximale de chaque image est de :max kilo-octets.',
            'title.required' => 'Le champ titre est obligatoire.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'title.unique' => 'Le titre existe déjà.',
            'description.required' => 'Le champ description est obligatoire.',
            
            'category.required' => 'Le champ catégorie est obligatoire.',
            'location.required' => 'Le champ emplacement est obligatoire.',
            'price.required' => 'Le champ prix est obligatoire.',
        ]);
    
      
      
           foreach ($validatedData['images'] as $image) {
                $image_path=$image->store("services", "public");  
                $images[]= $image_path;
                $img_url = implode(",",$images);
           }

        $id=Auth::id();
        $service = new Service();
        $service->title = $validatedData['title'];
        $service->description =$validatedData['description'];
        $service->price = $validatedData['price'];
        $service->location = $validatedData['location'];
        $service->user_id =$id ;
        $service->category_id = $validatedData['category'];
        $service->images = $img_url;
      
        $service->save();
        $this->dispatchBrowserEvent("service-added");
       
        return redirect('dashbord')-> with("from","add");
       
    }

    // remove selected image in input file 
    public function removetempimage($index){
      
        array_splice($this->images,$index,1);


    }
}
