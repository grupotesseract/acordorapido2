<input type="checkbox" name="id_empresas[]" value="{{ $id }}" 
{{-- Se o segundo parametro da url for numerico, entao estamos editando um user --}}
@if ( is_numeric(Request::segment(2)) )

    {{-- Se o id do usuario que estamos editando estiver dentro dos 'usuarios' dessa empresa, entao checked --}}
    @if ( collect($usuarios)->values()->contains('id', Request::segment(2)) )
        checked
    @endif
@endif  
/>
