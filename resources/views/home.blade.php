@extends('layouts.app')

@section('title')
    Pagina Principal
@endsection

@section('content')
    <x-list-post :posts="$posts"/>
@endsection
