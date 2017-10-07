@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuário
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                    <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
       <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-check" aria-hidden="true"></i> Permissões</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @include('users.show_permissions')
                </div>
            </div>
       </div>
    </div>
@endsection
