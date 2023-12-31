@extends('layouts.app')

@section('title')
    Inicia Sesión en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('message'))
                    <p
                        class="bg-red-500 text-white my-2
                        w-full rounded-lg text-sm p-2 text-center"
                    >
                        {{ session('message') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label
                        for="email"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Email</label>
                    <input
                        type="text"
                        id="email"
                        name="email"
                        placeholder="Tú Nombre Email de Registro"
                        class="border p-3 w-full rounded-lg
                        @error('emial')
                            border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p
                            class="bg-red-500 text-white my-2
                            w-full rounded-lg text-sm p-2 text-center"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label
                        for="password"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror"
                        value="{{ old('password') }}"
                    />
                    @error('password')
                        <p
                            class="bg-red-500 text-white my-2
                            w-full rounded-lg text-sm p-2 text-center"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input
                    type="checkbox"
                    name="remember"
                    id="remember">
                    <label
                        for="password"
                        class="text-gray-500
                        font-bold text-sm"
                    >Mantener mi sesión abierta</label>

                </div>

                <input
                    type="submit"
                    value="Inicia Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection
