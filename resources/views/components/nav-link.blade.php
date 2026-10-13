@props([
    'active' => false
])
<a {{ $attributes }} class="{{$active ? 'text-orange-900' : ''}}">
    {{ $slot }}
</a>
