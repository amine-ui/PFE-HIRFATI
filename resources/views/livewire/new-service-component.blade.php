

<div class=" d-flex justify-content-center">
           
    <div class=" post-left-box  m-3 bg-white shadow-sm p-3 mb-5  rounded  ">
       <div class=" justify-content-center align-items-center ">
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titre de l'annonce : </label>
                    <input type="title" class="form-control" name="title" id="exampleFormControlInput1"  wire:model="title">
                    @error('title')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">locatisation : </label>
                    <select name="location" wire:model="location" class="form-select" id="select-country" style="align-items: center ; text-align: left;"  wire:ignore>
                        <option > Sélectionnez la ville </option>
                    </select>
                    @error('location')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror

                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categorie :</label>
                    <select name="category" wire:model="category" class="form-select" id="select-category" style="align-items: center ; text-align: left;" >
                        <option > Sélectionnez la catégorie </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_title}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">A partir de : </label>
                    <input type="number" class="form-control" wire:model="price" id="exampleFormControlInput1" placeholder="à partir de ... ">
                    @error('price')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
                    <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" name="description" cols="50" rows="6" ></textarea>
                    @error('description')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                   
                </div>
                    <div class="mb-3">
                        <label for="formFileDisabled" class="form-label">les images de l'annonce : </label>
                        @if ($images)
                            <div class="d-flex mb-4 ">
                                @foreach ($images as $image)
                            
                                <div class=" position-relative  uploads-review " style="width: 150px; height: 150px; " wire:key="{{$loop->index}}">
                                    {{-- <i class="fa-sharp fa-solid fa-circle-xmark"></i> --}}
                                    <i class="fa-sharp fa-solid fa-circle-xmark position-absolute  close_icon"  wire:click="removetempimage({{$loop->index}})" style="cursor: pointer;"></i>
                                    <img src="{{ $image->temporaryUrl() }}" alt="Your Image" width="100%" height="100%" style=" object-fit: fill; border: 1px solid;" >
                                    
                                </div>
                                @endforeach
                            </div>
                        <div wire:loading wire:target="images">Uploading...</div>
                        @endif
                        <input class="form-control " type="file" id="formFileDisabled" wire:model="images"  multiple>
                        
                        @error('images')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid ">
                       
                            <button wire:click="store" class=" btn-block  btn btn-primary" >Ajouter Nouvelle Annonce </button>
                       
                    </div>
       </div>
    </div>
    
    <div class="post-right-box d-none d-xxl-block m-3 bg-white shadow-sm p-3 mb-5  rounded  ">
        <h6>Conseils pour accepter le service</h6>
        <div class="conseil">
            <div class="main-title">
                Description du service
            </div>
            <div class="main-body">
                <p>Rédigez une description distincte du service dans un langage approprié sans erreurs, au cours de laquelle vous expliquez en détail ce que le client recevra lors de l'achat du service.</p>
            </div>
        </div>
        <div class="conseil">
            <div class="main-title">
                Galerie de services
            </div>
            <div class="main-body">
                <p>Ajoutez une image expressive du service, en plus d'au moins trois formulaires exclusifs à travers lesquels l'acheteur connaîtra votre style de travail et vos compétences.
                </p>
            </div>
        </div>
        <div class="conseil">
            <div class="main-title">
                Prix ​​de la prestation
            </div>
            <div class="main-body">
                <p>Assurez-vous de fixer un prix approprié pour le service en fonction du volume de travail et d'effort, en tenant compte de la commission du site, et de définir un délai de livraison approprié pour compléter parfaitement le service.</p>
            </div>
        </div>
    </div>
</div>
</div>
