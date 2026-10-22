<x-layout>
    <h1 class="font-bold text-2xl mb-4">{{auth()->user()->name}}'s Favorites</h1>
    <div class="flex flex-wrap gap-7">
        @foreach($favorites as $favorite)
            <article class="border p-4 mb-4 rounded-xl w-80 min-h-96 flex flex-col justify-between">
                <div>
                <img src="{{ asset('storage/' . $favorite->build->image_url)}}" alt="{{$favorite->build->title}}"
                     class="w-full h-44 object-cover rounded-xl mb-2">
                <h2 class="font-bold">{{$favorite->build->title}}</h2>
                <p>{{$favorite->build->description}}</p>
                </div>
                <div>
                    <a class="p-2 bg-green-700 text-white rounded-lg hover:bg-green-600"
                       href="{{ route('builds-show', $favorite->build_id) }}">View Details</a>
                    <form method="POST" action="{{ route('favorites-destroy', $favorite->build_id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-orange-900 text-white rounded-lg hover:bg-orange-800">Remove
                            from favorites
                        </button>
                    </form>
                </div>
            </article>
        @endforeach
    </div>
</x-layout>
