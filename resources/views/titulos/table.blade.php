@section('css')
    @include('layouts.datatables_css')
@endsection

<style type="text/css">
	table.dataTable {
	    width: 100%;
	    margin: 0 auto;
	    clear: both;
	    border-collapse: separate;
	    border-spacing: 0;
	    font-size: 12px;
	}
	
</style>

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection