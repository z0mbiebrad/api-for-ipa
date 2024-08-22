<x-app-layout>
    <div class="pb-12">
        <div class="mx-auto w-11/12 sm:max-w-7xl sm:px-6 lg:px-8">
            @foreach ($breweries as $brewery)
                @if ($brewery->phone)
                    @php
                        $address = $brewery->street . ', ' . $brewery->city . ', ' . $brewery->state;
                        $encodedAddress = str_replace(' ', '+', $address);
                    @endphp
                    <div
                        class="my-4 overflow-hidden bg-white shadow-md shadow-[#023E7D] dark:bg-[#002855] sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-white text-md sm:text-lg">
                            <p class="">{{ $brewery->name }}</p>
                            <p>
                                <a class="" href="tel:{{ $brewery->phone }}">
                                    <i class="fa-solid fa-phone pr-1"></i>
                                    {{ $brewery->phone }}
                                </a>
                            </p>
                            @if ($brewery->website_url)
                                @php
                                    $url = $brewery->website_url;
                                    $prefixes = ['https://www.', 'http://www.', 'www.'];
                                    $trimmedUrl = str_replace($prefixes, '', $url);
                                @endphp
                                <p class="">
                                    <a href="{{ $brewery->website_url }}" class="-pl-1">
                                        <i class="fa-solid fa-globe pr-1"></i>
                                        {{ ucwords($trimmedUrl) }}
                                    </a>
                                </p>
                            @endif
                            @if ($address)
                                <p>
                                    <a href="http://maps.google.com/maps?q={{ $encodedAddress }}"
                                        target="_blank">
                                        <i class="fa-solid fa-map-marker-alt pr-1"></i>
                                        {{ $address }}
                                    </a>
                                </p>
                            @endif
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
