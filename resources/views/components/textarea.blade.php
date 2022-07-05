@props(['disabled' => false, 'field' => '', 'value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input form-text']) !!}>{{ $value }}</textarea>
@error($field)
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror