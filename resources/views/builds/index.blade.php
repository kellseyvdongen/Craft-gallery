<x-layout title="Builds">
    <h1 class="font-bold text-2xl mb-4">Builds</h1>
    <div class="flex flex-wrap gap-4">
    @foreach ($builds as $build)
            <article class="border p-4 mb-4 rounded-xl w-80 min-h-96 flex flex-col justify-between">
                <img src="{{ asset('storage/' . $build->image_url)}}" alt="{{$build->title}}"
                     class="w-full h-44 object-cover rounded-xl mb-2">
                <h2 class="font-bold">{{$build->title}}</h2>
                <p>{{$build->description}}</p>
                <div>
                    <a class="p-2 bg-green-700 text-white rounded-lg hover:bg-green-600"
                       href="{{ route('builds-show', $build->id) }}">View Details</a>
                    <a class="p-2 bg-green-700 text-white rounded-lg hover:bg-green-600"
                       href="{{ route('builds-edit', $build->id) }}">Edit/Delete</a>
                </div>
        </article>
    @endforeach
    </div>
</x-layout>
