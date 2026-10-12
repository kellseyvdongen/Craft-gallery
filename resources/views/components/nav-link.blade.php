@props([
    'active' => false
])
<a {{ $attributes }} class="{{$active ? 'background-color: #4CAF50;' : ''}}">
    {{ $slot }}
</a>
