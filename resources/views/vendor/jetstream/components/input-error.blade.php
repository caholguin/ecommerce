@props(['for'])

@error($for)
    <span {{ $attributes->merge(['class' => 'invalid-feedback']) }} role="alert">
        <strong style="color: red">{{ $message }}</strong>
    </span>
@enderror
