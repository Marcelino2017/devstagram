@extends('layouts.app')

@section('title')
    Crear una nueva publicación
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            Imagen aqui
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label
                        for="title"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Tiutlo</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Tu Titulo"
                        class="border p-3 w-full rounded-lg
                        @error('title')
                            border-red-500
                        @enderror"
                        value="{{ old('title') }}"
                    />
                    @error('title')
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
                        for="description"
                        class="mb-2 block uppercase text-gray-500
                        font-bold"
                    >Tiutlo</label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg
                        @error('description')
                            border-red-500
                        @enderror"

                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p
                            class="bg-red-500 text-white my-2
                            w-full rounded-lg text-sm p-2 text-center"
                        >
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection
