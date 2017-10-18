@extends('layouts.app')

<style> 

.datatable-user-crud {
    padding: 1em;
}

.dataTables_filter {
    display: none;
}


</style>

@section('content')
    <section class="content-header">
        <h1>
            Criando um novo usuário
        </h1>
    </section>
    <div class="content">
        {!! Form::open(['route' => 'users.store']) !!}

        @include('adminlte-templates::common.errors')

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-fields">
                        @include('users.fields')
                    </div>
                </div>
            </div>
        </div>

    
        <h3>Selecione as escolas que esse usuário terá acesso</h3>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                        <div class="datatable-user-crud">
                            @include('users.table')
                        </div>

                </div>
            </div>
        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
