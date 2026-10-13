<x-layout title="Builds">
    <h1>Builds</h1>
    @foreach ($builds as $build)
        <article class="border p-4 mb-4 rounded-xl ">
            <h2>{{$build->title}}</h2>
            <p>{{$build->description}}</p>
            <a href="{{ route('builds-show', $build) }}">View Details</a>
        </article>
    @endforeach
</x-layout>
