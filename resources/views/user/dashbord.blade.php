@extends('layouts.app')
@section('title')
    HIRFATI | DASHBORD 
@endsection

@section('content')
    <div class="container  mt-2">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link text-dark {{session()->has('from')?'': 'active'}} " id="parameter-tab" data-bs-toggle="tab" data-bs-target="#parameter-pane" type="button" role="tab" aria-controls="parameter-pane" aria-selected="{{session()->has('from') ?'false': 'true'}}">
                        Parameter
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link text-dark {{session()->has('from')?'active': ''}} " id="annonce-tab" data-bs-toggle="tab" data-bs-target="#annonce-pane" type="button" role="tab" aria-controls="annonce-pane" aria-selected="{{session()->has('from') ? 'true': 'false'}}">
                        Mes annonces
                    </button>
                    </li>


                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  {{session()->has('from')?'': 'show active'}}" id="parameter-pane" role="tabpanel" aria-labelledby="parameter" tabindex="0">
                        @livewire('user-settings-component')
                    </div>
                    <div class="tab-pane fade  {{session()->has('from')?'show active': ''}} " id="annonce-pane" role="tabpanel" aria-labelledby="annonce-tab" tabindex="0">
                        @livewire('user-annonce-component')
                    </div>

                  </div>
   
    </div>

@endsection
