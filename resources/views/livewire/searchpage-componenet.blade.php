<div>
    <div class="container">
        {{-- search --}}
        <div class="zone-search text-center shadow-sm p-3 rounded">
            <div class="row ">
                <div class=" col d-none d-sm-block ">
                    <div class="input-container">
                        <i class="prefix fa fa-search"></i>
                        <input type="search" class="form-control"  wire:model="searchtext"  placeholder="Que Recherche vous ?">
                    </div>
                </div>
                <div class="col ">
                    <div class="input-container">
                        <i class="prefix fa fa-filter"></i> 
                        <select name="category" class="form-select " id="select_category"  wire:model="category" data-live-search="true" data-live-search-style="startsWith">
                           <option value="">Sélectionnez la catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-container">
                        <i class="prefix fa-solid fa-location-dot"></i>
                        <select name="location" class="form-select" id="select-country" wire:model="location" style="align-items: center ; text-align: left;" wire:ignore>
                            <option value=""> Sélectionnez la ville </option>
                        </select>

                    </div>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center ">
                    <button wire:click="search" class="px-10 btn btn-primary " >RECHERCHE  </button>
                </div>
            </div>
        </div>
        {{-- result --}}
        <div class="d-flex bg-white login  flex-column annonces-section mb-50 " style="height: 100vh;"> 
            @if ($result->count()==0)
                <div class="container d-flex align-items-center mt-50 justify-content-center  " style="position: relative; top: 50%; bottom: 50%;">
                    <p style="position: relative; top: 50%; bottom: 50%;">aucun resultat</p>
                </div>
            @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($result  as $service)
                        <a href="{{route('service.show',$service)}}" class="" style="text-decoration: none" >
                            <div class="col">
                                <div class="card shadow-sm  p-3  rounded   ">
                                    @php
                                    $images = explode(',', $service->images);
                                    $firstImage = $images[0];
                                    @endphp
                                    <img src="{{asset('storage/'.$firstImage)}}" class=" card-img-top   "  height="180" width="100" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$service->title}}</h5>
                                        <p class="card-text" style="text-overflow: ellipsis;overflow: hidden; height: 50px;" >{{$service->description}}.</p>
                                    </div>
                                </div>
                            </div>
                        </a> 
                    @endforeach
            </div>
            @endif
        </div>
    </div>    
</div>
