
@extends('layouts.app')
@section('title')
  HERFATI | {{$service->title}}
@endsection

@section('style')
<link href="{{asset('assets/css/service/style.css')}}" rel="stylesheet" />
<style>
 

</style>
@endsection

@section('content')

<livewire:show-service-component  :service="$service" :images="$images" :avis_count="$avis_count" :avis="$avis"  />
    
@endsection