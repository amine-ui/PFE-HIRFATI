<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;

class SearchpageComponenet extends Component
{

   public $searchtext,$category,$location;

    public function mount($searchtext,$category,$location){
        $this->searchtext=$searchtext;
        $this->category=$category;
        $this->location=$location;
    }

    public function render()
    {
        if(empty($this->searchtext) and empty($this->category) and  empty($this->location)){
            $result=Service::all();
        }else{
            if(!empty($this->searchtext)and empty($this->category) and  empty($this->location)){
                $result=Service::where('title','like','%'. $this->searchtext .'%' )
                ->orWhere('description' , 'like','%'. $this->searchtext .'%')
                ->get();
            }elseif(!empty($this->category)and empty($this->searchtext) and  empty($this->location)){
                $result=Service::where('category_id','like','%'. $this->category .'%')->get();
            }
            elseif( !empty($this->location) and empty($this->category) and  empty($this->searchtext)){
                $result=Service::where('location','like','%'. $this->location .'%')->get();
            }
            else{
                $result=Service::all();
            }
        }
        $categories=Category::all();
        return view('livewire.searchpage-componenet',compact('result','categories'));
    }

    public function search(){
       
        if(empty($this->searchtext) and empty($this->category) and  empty($this->location)){
            $result=Service::all();
        }else{
            if(!empty($this->searchtext)and empty($this->category) and  empty($this->location)){
                $result=Service::where('title','like','%'. $this->searchtext .'%' )
                ->orWhere('description' , 'like','%'. $this->searchtext .'%')
                ->get();
            }elseif(!empty($this->category)and empty($this->searchtext) and  empty($this->location)){
                $result=Service::where('category_id','like','%'. $this->category .'%')->get();
            }
            elseif( !empty($this->location) and empty($this->category) and  empty($this->searchtext)){
                $result=Service::where('location','like','%'. $this->location .'%')->get();
            }
            else{
                $result=Service::all();
            }
        }
        $categories=Category::all();
        return view('livewire.searchpage-componenet',compact('result','categories'));
    }
}
