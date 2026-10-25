<nav class="bg-green-700 text-white flex flex-row justify-between items-center px-4 py-2">
    <div class="flex space-x-4">
        <x-nav-link href="{{ route('popular-builds') }}" :active="request()->routeIs('popular-builds')">Home
        </x-nav-link>
        <x-nav-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About us</x-nav-link>
        <div class="relative group">
            <x-nav-link href="{{ route('builds-index') }}" :active="request()->routeIs('builds-index')">Builds
            </x-nav-link>
            <div
                class="absolute left-0 top-full hidden group-hover:block bg-orange-900 shadow-lg rounded-lg w-48 py-2 z-50">
                <a href="{{ route('builds-index') }}" class="block px-4 py-2 text-white hover:bg-orange-800">All
                    Builds</a>
                @auth
                    <a href="{{ route('builds-create') }}" class="block px-4 py-2 text-white hover:bg-orange-800">Post
                        Build</a>
                    <a href="{{ route('favorites-index') }}" class="block px-4 py-2 text-white hover:bg-orange-800">Favorites</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="">
        <img class="h-14" src="{{ asset('images/craftgallery-logo.png') }}" alt="logo">
    </div>
    <div class="flex space-x-4 ">
        @auth
            @if(Auth::user()->role_id === 2)
                <x-nav-link href="{{ route('admin-builds') }}" :active="request()->routeIs('admin-builds')">
                    Admin
                </x-nav-link>
            @endif
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
