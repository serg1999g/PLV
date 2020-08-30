<div>
    <label {{ $id ?? false ? "for=$id" : '' }} class=" col-form-label text-md-right">{{ $label }}</label>

    <div class="input-group mb-4">
        <input
            {{ $id ?? false ? "id=$id" : '' }}
            type="{{ $type }}"
            class="form-control @error($name) is-invalid @enderror"
            {{ $name ?? false ? "name=$name" : '' }}
            {{ $placeholder ?? false ? "placeholder=$placeholder" : '' }}
            {{ $value ?? false ? "value=$value" : '' }}
            required
            autocomplete="{{$name}}"
            autofocus
        >
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
