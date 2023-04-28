<div>
    <div class="container login">
        <div class="row mb-4 mt-2">
            <div class="col-md-12 ">
                <h1>Conversations</h1>
            </div>
        </div>
       
            <div class="col-md-12 ">
                @if ( empty($conversations))
                    <div> aucun conversation</div>
                @else
                    
                    <ul>
                        @foreach($conversations as $conversation)
                            <li style="list-style: none">
                                <a href="{{ route('conversation.show', $conversation) }}" class="list-group-item">
                                    <div class=" shadow-sm mb-2 bg-white rounded row w-100 "  style="height:100px" >

                                        <img class="col-2 incoming_msg_img-conversation"   src="{{asset($conversation->user_id == auth()->user()->id ?'storage/'. App\Models\User::find( $conversation->recever_id)->image : 'storage/'.App\Models\User::find( $conversation->user_id )->image )}}" alt="" srcset="">
                                        <div class="body col p-3">
                                        <h5 class="title">{{$conversation->user_id == auth()->user()->id ? App\Models\User::find( $conversation->recever_id)->name .' ' .App\Models\User::find( $conversation->recever_id)->lastName :App\Models\User::find( $conversation->user_id )->name .' '.App\Models\User::find( $conversation->user_id)->lastName    }}</h5>
                                        <p class="text">about  {{ $conversation->service->title }}.</p>
                                        </div>
                                    </div>
                                    @if($conversation->messages->count() > 0)
                                        <span class="badge badge-primary"> {{ $conversation->messages->count() }}</span>
                                    @endif
                                </a>
                            </li>
                    @endforeach
                        
                    </ul>

                @endif
              
            </div>
    </div>
</div>
