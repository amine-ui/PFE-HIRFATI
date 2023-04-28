<div class="container  ">
    
    <form method="post">
        @csrf
         <div class="zone-search text-center shadow-sm p-3 rounded">
             <div class="row ">
                 <div class=" col d-none d-sm-block ">
                     <div class="input-container">
                         <i class="prefix fa fa-search"></i>
                         <input type="search" class="form-control" name="all" wire:model="searchtext" placeholder="Que Recherche vous ?">
                     </div>
                 </div>
                 <div class="col ">
                     <div class="input-container">
                         <i class="prefix fa fa-filter"></i> 
                         <select name="category" class="form-select " id="select_category" wire:model="category" data-live-search="true" data-live-search-style="startsWith">                                    <option selected>Choose Categorie</option>
                             @foreach ($categories as $category)
                                 <option value="{{$category->id}}">{{$category->category_title}}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="col">
                     <div class="input-container">
                         <i class="prefix fa-solid fa-location-dot"></i>
                         <select name="location" class="form-select" id="select-country" wire:model="location" style="align-items: center ; text-align: left;" >
                             <option value=""> choose Ville </option>
                         </select>

                     </div>

                 </div>
             </div>
             <div class="row mt-3">
                 <div class="col text-center ">
                     <button type="submit" class="px-10 btn btn-primary" >RECHERCHE AGENT </button>
                 </div>
             </div>
         </div>
    </form>

</div>