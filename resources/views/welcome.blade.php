<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Breweries') }}
        </h2>
    </x-slot>

    <h1 class="text-2xl text-center text-white">Craft Beer Compass</h1>
    <p class="text-lg text-center text-white"><span id="current-time"></span></p>

    <form action="{{ route('breweries.index') }}" method="GET" class="text-center">
        <div class="flex items-center justify-center">
            <input class="w-1/3" type="text" name="city_query" value="{{ request('city_query') }}"
                placeholder="Enter City" class="px-4 py-2 border rounded-l focus:outline-none">
            <input class="w-1/3" type="text" name="state_query" value="{{ request('state_query') }}"
                placeholder="Enter State" class="px-4 py-2 border rounded-l focus:outline-none">
        </div>
        <button type="submit" class="py-2 text-white bg-blue-500 rounded-r w-1/3">Search</button>
    </form>

    @if (session('message'))
        <div class="alert alert-info text-white text-center pt-8">
            {{ session('message') }}
        </div>
    @endif
    </div>
    </body>
</x-app-layout>

<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        document.getElementById('current-time').innerText = currentTime;
    }

    updateTime();

    setInterval(updateTime, 1000);
</script>
