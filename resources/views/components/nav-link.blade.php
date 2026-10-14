@props([
    'active' => false
])
<a {{ $attributes }} class="{{$active ? 'text-orange-900 font-extrabold underline' : ''}}">
    {{ $slot }}
</a>
