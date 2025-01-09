<form action="{!! $url !!}" {!! $attributes !!}>
    @csrf
    <button type="submit" class="{!! $basename !!}__link knopf red heading-font sharp ls-1 mt-1">
        <span class="{!! $basename !!}__label">{{ $label }}</span>
    </button>
</form>
