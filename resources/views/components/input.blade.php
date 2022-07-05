@props(['disabled' => false, 'field' => ''])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input form-text']) !!}>

@error($field)
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror