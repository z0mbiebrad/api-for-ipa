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
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 flex justify-between">
                    <div><i class="fa-regular fa-compass" style="color: #ffffff;"></i></svg>Craft Beer Compass</div>
                    <p class="text-lg text-right pr-1 text-white"><span id="current-time"></span></p>
                </h2>
            </div>
        </header>

        <main>
            <x-brewery-form></x-brewery-form>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
