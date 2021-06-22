@extends('base')

@section('content')

@if(isset($user))
    @dump($user)
@endif

@endsection