<div>
    @auth
        <p class="text-xl font-bold text-center mb-4">
            Agrega un Nuevo Comentaria
        </p>

        @if (session('message'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase fontbold">
                {{ session('message') }}
            </div>
        @endif

        <form  wire:submit.prevent="saveComment">
            <div class="mb-5">
                <label
                    for="comment"
                    class="mb-2 block uppercase text-gray-500
                    font-bold"
                >
                    Añade un Comentario
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    wire:model="comment"
                    placeholder="Agrega un Comentario"
                    class="border p-3 w-full rounded-lg
                    @error('comment')
                        border-red-500
                    @enderror"

                >{{ old('comment') }}</textarea>

                @error('comment')
                    <p
                        class="bg-red-500 text-white my-2
                        w-full rounded-lg text-sm p-2 text-center"
                    >
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button
                type="submit"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
            >
                Comentar Publicación
            </button>
        </form>
    @endauth

    <div class="bg-white shadow mb-6 max-h-95 overflow-x-scroll mt-10">
        @if ($post->comments->count())
            @foreach ($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                <div class=" relative p-5 border-gray-300 border-b">
                    <button
                        wire:click="destroyComment({{ $comment->id }})"
                        class="absolute top-5 right-5 z-10 text-gray-400 float-left hover:text-gray-900">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <a href="{{ route('posts.index', $comment->user) }}" class="font-bold uppercase">
                        {{ $comment->user->username }}
                    </a>
                    <p>{{ $comment->comment }}</p>
                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        @else
            <p class="p-10 text-center">No Hay Comenterios Aún</p>
        @endif
    </div>
</div>
