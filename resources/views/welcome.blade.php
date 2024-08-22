<x-app-layout>
    @if (session('message'))
        <div class="alert alert-info text-white text-center text-xl pt-8">
            {{ session('message') }}
        </div>
    @endif
</x-app-layout>