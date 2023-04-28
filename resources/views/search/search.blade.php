@extends('layouts.app')

@section('style')
    
@endsection

@section('content')
   @livewire('searchpage-componenet', ['searchtext' => $searchtext ,'category' => $category,'location' => $location])
@endsection