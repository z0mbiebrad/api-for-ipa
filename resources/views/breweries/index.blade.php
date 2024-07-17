{{-- @php
    $weatherTenHour = array_slice($weather, 10, true);
@endphp --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Breweries') }}
        </h2>
    </x-slot>

    <h1 class="text-white text-2xl text-center">API for IPA</h1>
    <p class="text-white text-lg text-center"><span id="current-time"></span></p>

    <form action="{{ route('breweries.index') }}" method="GET" class="flex items-center justify-center">
        <input type="text" name="city_query" value="{{ request('city_query') }}" placeholder="Enter City"
            class="px-4 py-2 border rounded-l focus:outline-none">
        <input type="text" name="state_query" value="{{ request('state_query') }}" placeholder="Enter State"
            class="px-4 py-2 border rounded-l focus:outline-none">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Search</button>
    </form>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex">
                {{-- @foreach ($weather as $weatherByTheHour)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p>{{ date('H:i A', (int) $weatherByTheHour->dt) }}</p>
                        <p>Temperature: {{ $weatherByTheHour->temp }}°</p>
                        <p>Feels like:{{ $weatherByTheHour->feels_like }}°</p>
                        <p>Humidity:{{ $weatherByTheHour->humidity }}°</p>
                        <p>{{ ucWords($weatherByTheHour->weather[0]->description) }}</p>
                    </div>
                @endforeach --}}
            </div>
            @foreach ($breweries as $brewery)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p>{{ $brewery->name }}</p>
                        <p>{{ $brewery->phone }}</p>
                        <p>{{ $brewery->website_url }}</p>
                        <p>{{ $brewery->street }}</p>
                        <p>{{ $brewery->city }}</p>
                        <p>{{ $brewery->state }}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</x-app-layout>
<script>
    // Function to get the user's current time and send it to the server
    // Function to get the user's current time and send it to the server via POST
    function sendCurrentTimeToServer() {
        var now = new Date();
        var utcTime = now.getTime() + (now.getTimezoneOffset() * 60000);

        // Create a new Date object in UTC time zone
        var utcDate = new Date(utcTime);

        // Create data object to send via POST
        var postData = {
            currentTime: utcDate.toISOString()
        };

        // Send the POST request using AJAX
        fetch('App/Services/WeatherAPI.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if needed
                },
                body: JSON.stringify(postData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response from server:', data);
                // Handle response data as needed
            })
            .catch(error => {
                console.error('Error sending POST request:', error);
                // Handle errors
            });
    }
    // Function to update the time
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        // Convert 24-hour format to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        // Display the current time
        document.getElementById('current-time').innerText = currentTime;
    }

    // Update the time immediately
    updateTime();

    // Update the time every second
    setInterval(updateTime, 1000);
</script>
