<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <header class="bg-black w-full h-dvh gap-5 flex flex-col md:flex-row p-10">
        <nav class="flex flex-col items-center justify-center text-center">
            <h1 class="text-white font-bold text-4xl md:text-7xl font-sans mb-10">Welcome to Noob to Root</h1>
            <h2 class="text-white text-3xl mb-2">Here I share my thoughts on various topics, mostly about software
                engineer</h2>
            <h4 class="text-white text-base">By Bradly Gutierrez</h4>
        </nav>
        <nav class="w-full h-full">
            <img src="./images/blogIlustration.png" alt="blog ilustration">
        </nav>


    </header>

    <main class="flex flex-col items-center justify-center text-center bg-white w-full h-auto">
        <section class="h-auto bg-[#2f4538] flex flex-col items-left justify-center text-left w-full p-10 ">
            <H1 class="text-white font-medium font-sans text-4xl mb-10">Here you can explore my lasts blogs and topics
                addressed</H1>

            <div class="flex flex-col items-start justify-start text-left bg-[#2f4538]">
                @foreach ($blog as $post)
                    <article class="border-b border-white/10 pb-8 p-10">
                        <p class="text-sm text-white/60">
                            Published on {{ optional($post->created_at)->format('F j, Y') }}
                        </p>
                        <a class="text-2xl font-bold text-white mb-2" href="{{ route('blog_post.show', $post->id) }}">
                            {{ $post->title }}</a>
                            
                        {{-- Render JSON blocks --}}
                       
                       {{-- @foreach ($post->content as $block)
                            @if ($block['type'] === 'paragraph')
                                <p class="text-white/80 mb-2">{{ $block['text'] }}</p>
                            @elseif ($block['type'] === 'image' && !empty($block['src']))
                                <img src="{{ asset('storage\app/public' . $block['src']) }}" alt=""
                                    class="my-4 rounded-lg shadow-lg max-w-full h-auto">
                            @endif
                        @endforeach --}} 

                    </article>
                @endforeach
            </div>

        </section>

    </main>
</body>



</html>