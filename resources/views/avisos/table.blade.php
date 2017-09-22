@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatable_dt_js')
    @include('layouts.datatable_dt_custom_js')
    @include('layouts.datatable_dt_buttons_js')
    {!! $dataTable->scripts() !!}
@endsection
