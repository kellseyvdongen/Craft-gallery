<x-layout>
    <h1 class="font-bold text-2xl mb-4">Manage builds</h1>
    <table class="w-full p-4">
        @foreach($builds as $build)
            <tr class="w-full justify-around border p-3">
                <td class="px-4 py-3">{{$build->title}}</td>
                <td class="px-4 py-3">{{$build->user?->name}}</td>
                <td class="px-4 py-3">
                    <form method="POST" action="{{route('admin-toggle', $build->id)}}">
                        <button>
                            @if($build->is_active === 0)
                                Activate
                            @else
                                Deactivate
                            @endif
                        </button>
                    </form>
                </td>
                <td class="px-4 py-3"><a href="{{route('builds-edit', $build->id)}}">Edit/Delete</a></td>
            </tr>
        @endforeach
    </table>
</x-layout>
