<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <header class="bg-white w-full h-auto gap-5 flex flex-col md:flex-row p-10">
        <h1 class="text-4xl font-bold text-black mb-2">{{ $post->title }}</h1>
    </header>
    <main class="bg-white w-full h-auto gap-5 flex flex-col md:flex-row p-10">
        @foreach ($post->content as $block)
        @if ($block['type'] === 'paragraph')
            <p class="text-black/80 mb-2">{{ $block['text'] }}</p>
        @elseif ($block['type'] === 'image' && !empty($block['src']))
            <img src="{{ asset('storage/' . $block['src']) }}" alt="" class="my-4 rounded-lg shadow-lg max-w-full h-auto">
        @endif
    @endforeach
    </main>
    

    
</body>



</html>