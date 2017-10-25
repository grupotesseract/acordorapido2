<style>
    td input[type="radio"] {
        float: left;
        margin: 0 auto;
        width: 100%;
    }
</style>

@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection