<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    {{-- Cara 1 --}}
    {{-- @livewire('user') --}}

    {{-- Cara 2 --}}
    {{-- <livewire:user /> --}}

    <div class="flex md:flex-row flex-col justify-center items-start gap-10">
        @livewire('user-register-form')
        {{-- Cara 1 --}}
        {{-- @livewire('user-list', ['lazy' => true]) --}}
        {{-- Cara 2 --}}
        <livewire:user-list lazy />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
