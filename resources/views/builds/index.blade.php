<x-layout title="Builds">
    <div class="flex flex-row justify-between mb-4">
        <h1 class="font-bold text-2xl">Builds</h1>
        <form method="GET" action="{{route('builds-index')}}">
            <input class="border-green-700 p-2" type="text" id="search" name="search" placeholder="search builds"
                   value="{{$search ?? ''}}">
            <select name="category">
                <option value="">All builds</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            <button class="p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Filter</button>
        </form>
    </div>
    @if ($builds->isEmpty())
        <p class="mt-6 text-gray-600">No builds found with this search.</p>
    @else
        <div class="flex flex-wrap gap-7">
    @foreach ($builds as $build)
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
                    @if(Auth::check() && Auth::user()->id === $build->user_id)
                        <a class="p-2 bg-orange-900 text-white rounded-lg hover:bg-orange-800"
                       href="{{ route('builds-edit', $build->id) }}">Edit/Delete</a>
                    @elseif(Auth::check() && Auth::user()->id != $build->user_id)
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
    @endif
</x-layout>
