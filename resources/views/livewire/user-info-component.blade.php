<div>
    <div class="container" style="padding: 40px">
       
            <div class="row ">
                <div class="  col ">
                    <label for="">Nom d'utilisateur</label>
                    <div class="input-container">
                        <i class="fa-solid fa-signature prefix"></i>
                        <input type="text" class="form-control mt-2 mb-3" name="name"  wire:model="name"  >
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                </div>
                <div class="col">
                    <label for="">Prénom d'utilisateur</label>
                    <div class="input-container">
                        <i class="fa-solid fa-signature prefix"></i>
                        <input type="text"   name="lastName" wire:model="lastName"  class="form-control mt-2 mb-3" >
                    </div>
                    @error('lastName')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                </div>
               
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email</label>
                    <div class="input-container">
                        <i class="prefix fa-solid fa-envelope"></i>
                        <input type="text"   name="email" wire:model="email"   class="form-control mt-2 mb-3"  >
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                </div>
                <div class="col">
                    <label for="">Télèphone </label>    
                    <div class="input-container">
                        <i class="prefix fa-solid fa-phone"></i>
                        <input type="number"   name="telephone" wire:model="telephone"  class="form-control mt-2 mb-3" >
                    </div>
                    @error('telephone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
          
            <div>
                <label for="bio">Bio</label>
                <textarea name="bio" id="" cols="10"  wire:model="bio" class="form-control mt-2 mb-3" rows="10"></textarea>
                @error('bio')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
            </div>
           <div class="row">
                <button class=" mx-auto btn btn-primary px-5 p-2 w-25  rounded-2  btn-sav" wire:click="SAUVEGARDE" >SAUVEGARDE </button>
           </div>

     
    </div>
</div>
