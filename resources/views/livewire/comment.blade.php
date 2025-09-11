<div>
    <ul class="my-4 space-y-2">

        @foreach ($comments as $comment)


            <li class="flex items-center gap-2 bg-gray-100">
                <p class="text-xs bg-white/10 p-4 rounded-md">
                    <span class="text-gray-700">
                        {{$comment->user->name}} |
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                    <span class="text-gray-800">
                        <p>

                        </p>
                        <p class="text-[1em] text-gray-800">
                            {{ $comment->content }}
                        </p>
                    </span>
                </p>

                <div style="color: #D3D3D3;">
                   <livewire:heart :heartable="$comment" />
                </div>
            </li>

        @endforeach


    </ul>

    @if ($showCommentForm)
        <form wire:submit = "add">
            <div class="flex gap-2 mb-4">
                <input type="text" wire:model="content" class="w-full text-xs outline-none" placeholder="Escribe tu comentario aquí..." required
                    autofocus>

                <button type="button" wire:click="toggleCommentForm" class="text-xs text-gray-600 hover:underline cursor-pointer">Cancelar</button>
                <button type="submit"
                    class="text-xs text-white bg-blue-600 hover:bg-blue-500 rounded-md px-2 py-1 cursor-pointer">
                    Comentar
                </button>
            </div>
            @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </form>
     @else
        <p class="text-gray-500 cursor-pointer mb-4" <a href="#" class="rounded-md text-xs hover:underline cursor-pointer "
            wire:click='toggleCommentForm'></a>>
            Agregar comentario
            </a>
        </p>
    @endif

</div>