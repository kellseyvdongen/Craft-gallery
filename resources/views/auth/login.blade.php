<style>
    form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    form div {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
</style>
<x-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <div class="max-w-5xl align-middle mx-auto p-4">
        <h1 class="font-bold text-2xl mb-4">Log in</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="font-bold" for="email">Email</label>
            <input class="border-green-700 p-2" type="email" id="email" name="email" value="{{ old('email') }}" required
                   autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="font-bold" for="password">Password</label>
            <input class="border-green-700 p-2" type="password" id="password" name="password" required
                   value="{{old('password')}}" autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                       class=" rounded border-gray-300 text-green-700 shadow-sm focus:ring-green-700">
                <span class="ms-2 text-sm text-green-700">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="p-2 text-green-700 hover:underline" href="{{ route('password.request') }}"> Forgot your
                    password?</a>
            @endif

            <button type="submit" class="ml-4 p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Log in</button>
        </div>
    </form>
    </div>
</x-layout>
