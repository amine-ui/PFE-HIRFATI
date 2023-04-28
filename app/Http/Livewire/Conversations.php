<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversations extends Component
{
    public function render()
    {
        $conversations = Conversation::where(function ($query) {
            $query->whereHas('service', function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('id', Auth::id());
                });
            });
        })
        ->orWhere('recever_id', Auth::id())
        ->orWhere('user_id', Auth::id())
        ->with('messages', 'service')
        ->latest()
        ->get();
        
        return view('livewire.conversations',compact('conversations'));
    }
}
