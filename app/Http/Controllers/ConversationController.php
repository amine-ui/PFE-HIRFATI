<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{

    public $conversations;



    public function index()
    {    
        return view('conversations.index');
    }

    public function show(Conversation $conversation)
    {
        $sender= $conversation->user_id == auth()->user()->id ?User::find( $conversation->recever_id) :User::find( $conversation->user_id );
        $conversation_id=$conversation->id;
        return view('conversations.show', compact('conversation_id','sender'));
    }

   
   
}
