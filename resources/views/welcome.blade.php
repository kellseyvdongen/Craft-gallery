<x-layout title="Home">
    <div class="mb-4">
        <h1 class="font-bold text-2xl">Welcome to Craft Gallery</h1>
        <p>See the most favorited builds here</p>
    </div>
    <div class="flex flex-wrap gap-7">
        @foreach($builds as $build)
            <article class="border p-4 mb-4 rounded-xl w-80 min-h-96 flex flex-col justify-between">
                <div>
                    <img src="{{ asset('storage/' . $build->image_url)}}" alt="{{$build->title}}"
                         class="w-full h-44 object-cover rounded-xl mb-2">
                    <h2 class="font-bold">{{$build->title}}</h2>
                    <p>{{$build->description}}</p>
                </div>
                <div class="flex flex-row gap-2">
                    <a class="p-2 bg-green-700 text-white rounded-lg hover:bg-green-600"
                       href="{{ route('builds-show', $build->id) }}">View Details</a>
                    @if(Auth::check() && Auth::user()->id != $build->user_id)
                        <form method="POST" action="{{ route('favorites-store', $build->id) }}">
                            @csrf
                            <button class="p-2 bg-green-700 text-white rounded-lg hover:bg-green-600"
                                    type="submit">Favorite
                            </button>
                        </form>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</x-layout>
