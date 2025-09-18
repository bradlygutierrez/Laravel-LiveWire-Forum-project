<nav class="flex items-center justify-between h-16 md:pr-20 md:pl-20">
    @if (Route::is('blog.show'))
         <div class="flex gap-4">
            <a href="{{ route('home') }}" class="text-white text-sm font-semibold">Foro</a>
            <a href="{{ route('blog.show') }}" class="text-white text-sm font-semibold">Blog</a>
        </div>

        <div>
            <a href="#" class="text-white text-sm font-semibold">Log in &rarr;</a>
        </div>
       
    @elseif(Route::is('home','questions.show','blog_post.show'))
        <div class="flex gap-4">
            <a href="{{ route('home') }}" class="text-black text-sm font-semibold">Foro</a>
            <a href="{{ route('blog.show') }}" class="text-black text-sm font-semibold">Blog</a>
        </div>

        <div>
            <a href="#" class="text-sm font-semibold">Log in &rarr;</a>
        </div>
    @endif

</nav>