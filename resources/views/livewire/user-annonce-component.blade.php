<div>

    <div class="d-flex bg-white login  flex-column annonces-section mb-50 " style="overflow-y: scroll; height: 100vh;"> 
        @if ($services->count()==0)
            <div class="container d-flex align-items-center mt-50 justify-content-center " style="position: relative; top: 50%; bottom: 50%;">
                <p class="">aucun service</p>
            </div>
        @else
        @foreach ($services  as $service)
        <div class="  shadow-sm  p-3  rounded mb-10  w-100 my_annonce "  >
            <div class="d-flex align-items-center justify-content-between">
                <div class="flex-shrink-0">
                    @php
                        $images = explode(',', $service->images);
                        $firstImage = $images[0];
                    @endphp
                    <img src="{{asset('storage/'.$firstImage)}}" class=" rounded-start   "  height="180" width="180" alt="...">
                </div>
                <div class="flex-grow-1 mx-3 w-50 ">
                    <h2 class="card-title">{{$service->title}}</h2>
                    <p class="card-text" style="text-overflow:  ellipsis; width:100%; height: 20px; overflow:  hidden;">{{$service->description}}</p>
                    <h4 class="card-text overflow-hidden">crée le : {{$service->created_at}}</h4>
                </div>
                <div class="flex-shrink-0 " >
                    <a href="{{route('service.edit',$service)}}" class="btn btn-success align-item-center col " >Modifier</a>
                    <button wire:click.prevent="deleteConfirmation({{$service->id}})" class="btn btn-danger align-item-center col ">Supprimer</button>

                </div>
                </div>
            </div>
        
            @endforeach
            <a class="btn btn-primary w-25  mt-10 mx-auto" style="margin-top: 27px;" href="{{route('service.post')}}"> DEPOSER VOTRE TRAVAIL</a>
        @endif
    </div>
</div>





