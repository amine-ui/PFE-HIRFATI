<?php

namespace App\Http\Livewire;
use App\Models\Conversation;
use Livewire\Component;

class ShowServiceComponent extends Component
{

    public $service;
    public $images;
    public $avis;
    public $avis_count;
    

    public function mount($service , $images,$avis_count,$avis){
        $this->service=$service;
        $this->images=$images;
        $this->avis=$avis;
        // ,$avis ,$avis_count
        $this->avis_count=$avis_count;

    }

    public function startConversation()
    {

       
        $conversation = Conversation::where('user_id', auth()->id())
            ->orWhere('recever_id', auth()->id())
            ->where('service_id', $this->service->id)
            ->first();
            
      

        //  $conversation = Conversation::where('user_id', auth()->id())
        //     ->where('service_id', $this->service->id)
        //     ->orWhere('recever_id', $this->service->id)
        //     ->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'user_id' => $this->service->user->id ,
                'service_id' => $this->service->id,
                'recever_id'=> auth()->id()
            ]);

            // $conversation = Conversation::create([
            //     'user_id' => auth()->id(),
            //     'service_id' => $this->service->id,
            // ]);
        }

        return redirect()->route('conversation.show', $conversation->id);
    }

    
    public function render()
    {
        return view('livewire.show-service-component');
    }
}
