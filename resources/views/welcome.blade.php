<x-app-layout>
    <body class="antialiased">
        <div class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <h1 class="text-white text-2xl text-center">API for IPA</h1>    

            <form action="{{ route('breweries.index') }}" method="GET" class="flex items-center justify-center">
                <input type="text" name="city_query" value="{{ request('city_query') }}" placeholder="Enter City" class="px-4 py-2 border rounded-l focus:outline-none">
                <input type="text" name="state_query" value="{{ request('state_query') }}" placeholder="Enter State" class="px-4 py-2 border rounded-l focus:outline-none">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Search</button>
            </form>
            
        </div>
    </body>
</x-app-layout>
