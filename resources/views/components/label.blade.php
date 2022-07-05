@props(['value'])

<label {{ $attributes->merge(['class' => 'block label-font']) }}>
    {{ $value ?? $slot }}
</label>
