<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="p-5">
    <nav class="w-full  h-16 pl-10 pr-10 border-b border-black/10">
        <x-w-e-b--l-a-r-a-v-e-l.layouts.navbar />
    </nav>
    <header class="bg-white w-full h-auto flex flex-col pb-5 p-10">
        <h1 class="text-4xl font-bold text-black mb-1">{{ $post->title }}</h1>
    </header>
    <main class="bg-white w-full h-auto gap-5 flex flex-col pt-5 p-10">
        @foreach ($post->content as $block)
            @if ($block['type'] === 'paragraph')
                <p class="text-black/80 mb-2">{{ $block['text'] }}</p>
            @elseif ($block['type'] === 'image' && !empty($block['src']))
                <img src="{{ asset('storage/' . $block['src']) }}" alt="" class="my-4 rounded-lg shadow-lg max-w-full h-auto">
            @endif


        @endforeach
    </main>
    <section class="p-10">
        <livewire:comment :commentable="$post" />
    </section>

    <ul class="space-y-4">

        <!-- foreach / answers -->

        @foreach ($post->answers as $answer)
            <li>
                <div class="flex items-start gap-2">
                    <div style="color: #D3D3D3 ;">

                        <livewire:heart :heartable="$answer" wire:key="answer-comments-{{ $answer->id }}" />
                    </div>

                    <div>
                        <p class="text-sm text-black">
                            {{ $answer->content }}
                        </p>
                        <p class="text-xs text-black">
                            {{ $answer->user->name }} | Created at
                            {{ $answer->created_at->diffForHumans() }}
                        </p>

                        <!-- Comments -->
                        <livewire:comment :commentable="$answer" wire:key="answer-comments-{{ $answer->id }}" />

                        <!-- Comments -->
                    </div>
                </div>
            </li>
        @endforeach


        <!-- endforeach -->
    </ul>

    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-2">Tu Respuesta...</h3>

        <form action="{{ route('answers.store.blog', $post) }}" method="POST">
            @csrf

            <div class="mb-2">
                <textarea name="content" rows="6" class="w-full p-2 border rounded-md text-xs" required></textarea>
                @error('content')<span class="block text-red-500 text-xs">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="rounded-md bg-blue-600 hover:bg-blue-500 px-4 py-2 text-white cursor-pointer">
                Enviar Respuesta
            </button>
        </form>
    </div>


</body>



</html>