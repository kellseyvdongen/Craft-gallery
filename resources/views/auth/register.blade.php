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
    <div class="max-w-5xl align-middle mx-auto p-4">
        <h1 class="font-bold text-2xl mb-4">Make account</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label class="font-bold" for="name">Name</label>
            <input class="border-green-700 p-2" type="text" id="name" name="name" required value="{{old('name')}}">
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label class="font-bold" for="email">Email</label>
            <input class="border-green-700 p-2" type="email" id="email" name="email" value="{{ old('email') }}" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="font-bold" for="password">Password</label>
            <input class="border-green-700 p-2" type="password" id="password" name="password" required
                   value="{{old('password')}}">
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label class="font-bold" for="password_confirmation">Confirm Password</label>
            <input class="border-green-700 p-2" type="password" id="password_confirmation" name="password_confirmation"
                   required value="{{old('password_confirmation')}}" autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="p-2 text-green-700 hover:underline" href="{{ route('login') }}"> already registered?</a>
            <button type="submit" class="ml-4 p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Register
            </button>
        </div>
    </form>
    </div>
</x-layout>
