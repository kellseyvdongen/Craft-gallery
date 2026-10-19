<x-layout title="{{ $build->title }}">
    <div class="flex flex-row gap-10 align-middle">
        <div class="flex-1 flex flex-col gap-7">
            <div>
                <h1 class="font-bold text-2xl mb-4">{{ $build->title }}</h1>
                <p>{{ $build->description }}</p>
            </div>
            <a href="{{ route('builds-index') }}"
               class="bg-green-700 text-white py-2 px-4 rounded-md hover:bg-green-600 text-center">Back to Builds</a>
        </div>
        <div class="flex-1">
            <img src="{{ asset('storage/' . $build->image_url) }}" alt="{{$build->title }}"
                 class="w-full h-4/5 object-cover rounded-xl mb-2">
        </div>
    </div>
</x-layout>
