<form action="{{ route('breweries.index') }}" method="GET" class="text-center pt-4">
    <div class="flex items-center justify-center gap-x-2">
        <input class="w-2/5 sm:w-1/5 rounded-xl px-1 py-1 border focus:outline-none pl-4" type="text"
            name="city_query" value="{{ request('city_query') }}" placeholder="Enter City">
        <input class="w-2/5 sm:w-1/5 rounded-xl px-1 py-1 border focus:outline-none pl-4" type="text"
            name="state_query" value="{{ request('state_query') }}" placeholder="Enter State">
    </div>

    <button type="submit" class="px-1 py-1 mt-2 text-white bg-blue-500 rounded-xl w-1/2 sm:w-1/5">Search</button>

</form>