@props(['name', 'label', 'value' => '', 'type' => 'text'])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid  @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">
    @error($name)
        <span class="error invalid-feedback" id="{{ $name }}">{{ $message }}</span>
    @enderror
</div>