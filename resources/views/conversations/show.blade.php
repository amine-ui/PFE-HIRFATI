@extends('layouts.app')

@section('style')
<link href="{{asset('assets/css/chat/style.css')}}" rel="stylesheet" />

@endsection



@section('content')
    @livewire('chat', ['conversation_id' => $conversation_id , 'sender'=>$sender])
@endsection