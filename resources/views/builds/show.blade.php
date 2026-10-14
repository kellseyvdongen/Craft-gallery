<x-layout title="{{ $build->title }}">
    <h1>{{ $build->title }}</h1>
    <p>{{ $build->description }}</p>
    <a href="{{ route('builds-index') }}" class="text-orange-900 hover:underline">Back to Builds</a>
</x-layout>
