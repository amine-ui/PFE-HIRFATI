<div>
    <form wire:submit.prevent="SAUVEGARDE">
 
   
    <div class="container" style="padding: 50px">
        <div class="col">
            <label for="">Mot de passe Actuel</label>
            <div class="input-container">
                <i class="prefix fa-solid fa-lock"></i>
                <input type="password" class="form-control mt-2 mb-3" wire:model="currentpassword" placeholder="&#xf084  taper votre Mot de passe" required>
            </div>
            @error('currentpassword')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
        </div>
        <div class="col">
            <label for="">Nouveau mot de passe</label>
            <div class="input-container">
                <i class="prefix fa-solid fa-lock"></i>
                <input type="password" class="form-control mt-2 mb-3" wire:model="newpassword" placeholder="&#xf084 taper un nouveau Mot de passe" required>
            </div>
            @error('newpassword')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
        </div>
        <div class="col">
            <label for="">Confirmer mot de passe</label>
            <div class="input-container">
                <i class="prefix fa-solid fa-lock"></i>
                <input type="password" class="form-control mt-2 mb-3" wire:model="confirm_newpassword" placeholder="&#xf084 retaper votre Mot De Pass" required >
            </div>
            @error('confirm_newpassword')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
        </div>
        
        <div class="col mt-10">
            <button class="btn btn-primary px-5 py-2 rounded-2 w-25 mx-auto  btn-sav"  >SAUVEGARDE </button>
        </div>

    </div>
</form>
</div>
