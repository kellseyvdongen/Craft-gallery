<x-layout>
        <h1 class="font-bold text-2xl mb-4">Manage builds</h1>
        <div class="flex flex-col gap-4">
            @foreach($builds as $build)
                <article class="flex flex-row p-4 border rounded-xl justify-between">
                    <h2 class="flex-1">{{$build->title}}</h2>
                    <p class="flex-1">{{$build->user?->name ?? 'Unknown'}}</p>
                    <div class="flex-1">
                        <a>Deactivate</a>
                        <a href="{{route('builds-edit', $build->id)}}">Edit</a>
                    </div>
                </article>
            @endforeach
        </div>
</x-layout>
