@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 mb:py-10">
                <p class="text-gray-700 text-2xl">
                    {{ $user->name }}
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                   0 <span class="font-normal">Segidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                   0 <span class="font-normal">Seguidos</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                   0 <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection
