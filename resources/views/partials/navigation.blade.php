<nav class="bg-green-700 text-white flex justify-between items-center px-4 py-2">
    <div class="flex space-x-4">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
        <x-nav-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About us</x-nav-link>
        <x-nav-link href="{{ route('builds-index')}}" :active="request()->routeIs('builds-index')">Builds</x-nav-link>
        <x-nav-link href="{{ route('builds-create') }}" :active="request()->routeIs('builds-create')">Create Build
        </x-nav-link>
    </div>
    <div>
        <img class="h-14" src="{{ asset('images/craftgallery-logo.png') }}" alt="logo">
    </div>
    <div class="flex space-x-4">
        @auth
            <x-nav-link>{{ Auth::user()->name }}</x-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                <button type="submit">Log out</button>
            </form>
        @else
            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-nav-link>
            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
        @endif
    </div>
</nav>
