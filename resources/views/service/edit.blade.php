@extends('layouts.app')

@section('title')
    HERFATI  | UPDATE SERVICE
@endsection

@section('style')
    <style>
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="container  ">
        <div class="row mt-3">
            <div class="col text-center ">
                <h2>Modifier l' ANNONCE</h2>
            </div>
        </div>
        <livewire:edit-component :service="$service" :categories="$categories" />
    </div>
@endsection
