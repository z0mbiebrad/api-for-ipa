<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @foreach ($breweries as $brewery)
                @if ($brewery->phone)
                    @php
                        $address = $brewery->street . ', ' . $brewery->city . ', ' . $brewery->state;
                        $encodedAddress = str_replace(' ', '+', $address);
                    @endphp
                    <div class="my-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-slate-200">
                            <p class="text-red-300">{{ $brewery->name }}</p>
                            <p><a href="tel:{{ $brewery->phone }}">{{ $brewery->phone }}</a></p>
                            <p class="text-blue-400"><a href="{{ $brewery->website_url }}">{{ $brewery->website_url }}</a></p>
                            <p><a href="http://maps.google.com/maps?q={{ $encodedAddress }}" target="_blank">{{ $address }}</a></p>
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
</script>
