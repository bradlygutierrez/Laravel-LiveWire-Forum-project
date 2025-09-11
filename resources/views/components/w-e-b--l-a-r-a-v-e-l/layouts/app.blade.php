<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de programación</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-black">
    <div class="px-4 border-b border-black">
        <x-w-e-b--l-a-r-a-v-e-l.layouts.navbar/>
    </div>
    
    <div class="mx-auto max-w-4xl px-4 pb-8 text-black">
        {{ $slot }}
    </div>
</body>
</html>
