<x-layout>
    @if(Auth::user()->role_id === 2)
        <h1 class="font-bold text-2xl mb-4">Manage builds</h1>
        <div class="flex flex-col gap-4">
            @foreach($builds as $build)
                <article class="flex flex-row p-4 border rounded-xl justify-between">
                    <h2 class="flex-1">{{$build->title}}</h2>
                    <p class="flex-1">{{$build->user?->name ?? 'Unknown'}}</p>
                    <button class="flex-1">Deactivate</button>
                </article>
            @endforeach
        </div>
    @else
        <p>U are not authorized to use this page</p>
    @endif
</x-layout>
