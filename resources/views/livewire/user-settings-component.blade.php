<div>

    <div class="d-flex bg-white mb-10 flex-column align-items-center justify-content-center user-section"> 

        {{-- update image  --}}
        <div class=" position-relative dashbord_image_user my-2  ">
                <img src="{{$image ? $image->temporaryUrl() : asset('storage/'.auth()->user()->image)}}" class="dashbord_image_user"   alt="">
                <input class="position-absolute "  type="file" wire:model="image">            
        </div>
        <button class="btn btn-primary  rounded-2  btn-sav" wire:click="SAUVEGARDE" >SAUVEGARDE IMAGE</button>


         <div class="  w-100">
            
                <ul class="nav nav-tabs settings-nav " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-dark active" id="info-user" data-bs-toggle="tab" data-bs-target="#info-user-pane" type="button" role="tab" aria-controls="info-user-pane" aria-selected="true">
                    Modifier Les Informations
                </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-dark  " id="user-password" data-bs-toggle="tab" data-bs-target="#user-password-pane" type="button" role="tab" aria-controls="user-password-pane" aria-selected="false">
                    Modifier Le Mot De Passe
                </button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                {{-- info --}}
                <div class="tab-pane fade show active" id="info-user-pane" role="tabpanel" aria-labelledby="info-user" tabindex="0">
                    <livewire:user-info-component/>
                </div>
                {{-- password --}}
                <div class="tab-pane fade" id="user-password-pane" role="tabpanel" aria-labelledby="user-password" tabindex="0">
                   <livewire:user-password-component/>
                </div>
              </div>




             {{-- <div class="tab-child ms-5 d-flex flex-column w-25">
                 <h4 class="my-3 navy fw-bold">Modifier Informations</h4>
                
             </div>
             <div class="tab-child ms-5 d-flex flex-column w-25">
                 <h4 class="my-3 navy fw-bold">Modifier Mot de passe</h4>
                
             </div> --}}
         </div>
        
       </div>
</div>
