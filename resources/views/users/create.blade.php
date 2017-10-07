@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store']) !!}

                        <div class="form-fields">
                            @include('users.fields')
                        </div>

                        <hr>

                        <div style="padding:1em">
                            @include('users.table')
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                        </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
