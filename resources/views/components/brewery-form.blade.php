<form action="{{ route('breweries.index') }}" method="GET" class="text-center pt-4">
    <div class="flex items-center justify-center gap-x-4">
        <input class="w-1/4 rounded-2xl px-2 py-2 border focus:outline-none" type="text"
            name="city_query" value="{{ request('city_query') }}" placeholder="Enter City">
        <input class="w-1/4 rounded-2xl px-2 py-2 border focus:outline-none" type="text"
            name="state_query" value="{{ request('state_query') }}" placeholder="Enter State">
    </div>

    <button type="submit" class="py-2 mt-4 text-white bg-blue-500 rounded-2xl w-1/3">Search</button>

</form>