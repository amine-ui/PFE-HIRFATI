@extends('layouts.app')

@section('title')
    HERFATI  | DEPOSE TRAVAIL
@endsection

@section('style')
    <style>

        
    </style>
@endsection

@section('script')



    

@endsection

@section('content')
    <div class="container  ">
        <div class="row ">
            <div class="col text-center mt-3">
                <h2>AJOUTER UNE NOUVELLE ANNONCE</h2>
            </div>
        </div>
        <livewire:new-service-component :categories="$categories" />
    </div>
@endsection