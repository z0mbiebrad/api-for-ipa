{{-- @php
    $weatherTenHour = array_slice($weather, 10, true);
@endphp --}}


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


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                {{-- @foreach ($weather as $weatherByTheHour)
                    <div class="p-6 text-gray-900 dark:text-slate-200">
                        <p>{{ date('H:i A', (int) $weatherByTheHour->dt) }}</p>
                        <p>Temperature: {{ $weatherByTheHour->temp }}°</p>
                        <p>Feels like:{{ $weatherByTheHour->feels_like }}°</p>
                        <p>Humidity:{{ $weatherByTheHour->humidity }}°</p>
                        <p>{{ ucWords($weatherByTheHour->weather[0]->description) }}</p>
                    </div>
                @endforeach --}}
            </div>
            @dd($breweries)
            @foreach ($breweries as $brewery)
                @if ($brewery->phone)
                    @php
                        $address = $brewery->street . ', ' . $brewery->city . ', ' . $brewery->state;
                        $encodedAddress = str_replace(' ', '+', $address);
                    @endphp
                    <div class="my-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-slate-200">
                            <p class="text-red-100">{{ $brewery->name }}</p>
                            <p class=""><a href="tel:{{ $brewery->phone }}">{{ $brewery->phone }}</a></p>
                            <p class="text-blue-400"><a href="{{ $brewery->website_url }}">{{ $brewery->website_url }}</a></p>
                            <p><a href="http://maps.google.com/maps?q={{ $encodedAddress }}" target="_blank">
                                {{ $address }}
                            </a></p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
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

    $(document).ready(function() {
        // Convert address paragraphs to google map links
        $('p.address').each(function() {
            var addressText = $(this).text().trim();
            var link = "<a href='http://maps.google.com/maps?q=" + encodeURIComponent(addressText) +
                "' target='_blank'>" + addressText + "</a>";
            $(this).html(link);
        });
    });
</script>
