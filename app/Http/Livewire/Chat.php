<?php

namespace App\Http\Livewire;

use App\Models\avis;
use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{

    
    public $conversation_id;
    public $messageText;
    public $sender;
    public $review;
    public $rate;

    protected $listeners = ['sendMessage' => '$refresh'];

    public function mount( $conversation_id , $sender){

        $this->conversation_id=$conversation_id;
        $this->sender=$sender;
    }

    public function render()
    {
         $messages = Message::all()->where('conversation_id', '=', $this->conversation_id);
        return view('livewire.chat',compact('messages'));
    }

    public function sendMessage()
    {

        Message::create([
            'sender_id' => auth()->user()->id,
            'body' => $this->messageText,
            'conversation_id'=> $this->conversation_id
        ]);

        $this->reset('messageText');
    }

    
    public function addreview($service_id){
        $newReview=new avis();
        $newReview->review=$this->review;
        $newReview->user_id=auth()->user()->id;
        $newReview->service_id=$service_id;
        $newReview->rattings=$this->rate;
        $newReview->save();
        $this->dispatchBrowserEvent("avis");

        
    }

    public function demmande($service_id){

        
        
        $this->dispatchBrowserEvent("demmande");
        
        
    }

}
