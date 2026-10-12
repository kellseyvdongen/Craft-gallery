<style>
    nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        gap: 20px;
        background-color: #275527;
        padding: 10px;
    }

    nav div {
        display: flex;
        flex-direction: row;
    }

    a {
        color: white;
        padding: 12px;
        text-decoration: none;
    }

    img {
        width: 140px;
        height: auto;
    }
</style>
<nav>
    <div>
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
        <x-nav-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About us</x-nav-link>
    </div>
    <div>
        <img src="{{ asset('images/craftgallery-logo.png') }}" alt="logo">
    </div>
    <div>
        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-nav-link>
        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
    </div>

</nav>
