<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CraftBeerCompass') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/2a492774b7.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black">
    <div class="min-h-screen bg-gray-100 dark:bg-[#001d3d]">

        <header class="bg-white dark:bg-[#002855]">
            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8 shadow-md shadow-[#023E7D]">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white flex justify-between">
                    <div><i class="fa-regular fa-compass"></i></svg> Craft Beer Compass</div>
                </h2>
            </div>
        </header>

        <main class="bg-[#001d3d]">
            <x-brewery-form></x-brewery-form>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
