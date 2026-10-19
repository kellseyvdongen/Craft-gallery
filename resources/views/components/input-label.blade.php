@props(['value'])

<label {{ $attributes->merge(['class' => 'border-green-700 p-2']) }}>
    {{ $value ?? $slot }}
</label>
