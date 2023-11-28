@extends('layouts.app')

@section('title')
    Registrate en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Nombre</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tú Nombre"
                        class="border p-3 w-full rounded-lg"
                    />
                    @error('name')
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
                        for="username"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tú Nombre de Usuario"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
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
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="password"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Password</label>
                    <input
                        type="text"
                        id="password"
                        name="password"
                        placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="password_confirmation"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Repetir Password</label>
                    <input
                        type="text"
                        id="password_confirmation"
                        placeholder="Repite Tu Password"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection
