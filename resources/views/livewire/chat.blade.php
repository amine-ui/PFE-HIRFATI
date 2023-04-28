
<div wire:poll>
 <div class="container " style="margin-top: 4vh" >
    
        <div class="messaging">
            {{-- source of message --}}
           
            <div class="inbox_msg shadow-sm py-2 px-3 mb-2 bg-white rounded">
                <div class=" d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{asset('storage/'.$sender->image)}}" height="60px" width="60px" class="icon" alt="" srcset="">
                      <div class="ms-3 apropos">
                        <h4 class="align-items-meddle">{{$sender->name ." ".$sender->lastName}}</h4>
                      </div>
                    </div>
                    {{-- action  --}}
                    @if (App\Models\Conversation::find($conversation_id)->service->user_id != auth()->user()->id) 

                            {{-- <i class="fa-solid fa-circle-info fa-2x " style="color: #000080;"></i> --}}
                            <a  type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                <i class=" fa fa-light fa-circle-info fa-2x " style="color: #000080;"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa-regular fa-face-smile"></i>Ajouter l'évaluation</a>
                                <a type="button" wire:click="demmande({{App\Models\Conversation::find($conversation_id)->service->id}})" class="dropdown-item" ><i class="fas fa-credit-card"></i>Dommander Service</a>
                            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
                            <div class="modal-dialog">
                                <form wire:submit.prevent="addreview({{App\Models\Conversation::find($conversation_id)->service->id}})">
                                    <div class="modal-content row p-5 d-flex  align-items-center ">
                                        <div class="modal-body">
                                                <div class="rate  ">
                                                    <input type="radio" id="star5" wire:model="rate"  value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" wire:model="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" wire:model="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" wire:model="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" wire:model="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                                    <textarea class="form-control my-2" name="opinion" wire:model="review" cols="30" rows="5" placeholder="votre avis..."></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Poster</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    @endif
                </div> 
            </div>
            <div class="inbox_msg shadow-sm p-3 mb-5 bg-white rounded">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                        @forelse ($messages as $message)
                            @if ($message->sender_id == auth()->user()->id)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->body }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}
                                        </span>
                                    </div>
                                </div>

                            @else
                              
                                <div class="incoming_msg mb-3 ">
                                    <div class="incoming_msg_img ">
                                         <img class="sender_img" src="{{asset($message->conversation->user_id == auth()->user()->id ?'storage/'. App\Models\User::find( $message->conversation->recever_id)->image : 'storage/'.App\Models\User::find( $message->conversation->user_id )->image )}}" alt="user image "> 
                                    </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->body }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:#000080"> Aucun message </h5>
                        @endforelse
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg form-control "  placeholder="votre message"  />
                                <button class="msg_send_btn btn btn-primary" type="submit">Envoyer</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
   
</div> 
</div> 

