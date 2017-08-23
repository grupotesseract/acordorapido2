<!-- Optionally, you can add icons to the links -->
<li class="{{ Request::is('home*') ? 'active' : '' }}"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></i> <span>{{ trans('message.home') }}</span></a></li>

@role('admin')
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='glyphicon glyphicon-dashboard'></i> <span>Estatísticas</span></a></li>
<li class="{{ Request::is('empresas*') || Request::is('clientes*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-th-list'></i> <span>Cadastros</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('empresas*') ? 'active' : '' }}"><a href="{{ url('empresas') }}"><i class='glyphicon glyphicon-education'></i>Escolas</a></li>
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
            <a href="{{ url('clientes') }}"><i class='glyphicon glyphicon-user'></i> <span>Alunos</span></a>
        </li>
        <li class="treeview">
            <a href="#"><i class='glyphicon glyphicon-user'></i><span>Usuários</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li> <a href="#"><i class='glyphicon glyphicon-user'></i> <span>Operadores</span> </a> </li>
                <li> <a href="#"><i class='glyphicon glyphicon-eye-open'></i> <span>Administradores</span> </a></li>
                <li> <a href="#"><i class='glyphicon glyphicon-education'></i> <span>Escolas</span></a> </li>
                <li> <a href="#"><i class='glyphicon glyphicon-lock'></i> <span>Permissões</span> </a></li>
            </ul>
        </li>
    </ul>
</li>
<li class="{{ Request::is('importacao*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-import'></i> <span>Importações</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('importacao/azul') ? 'active' : '' }}"><a href="{{url('importacao/azul')}}"><label class="label label-modulo-azul"> <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span></label> Preventiva</a></li>
        <li class="{{ Request::is('importacao/verde') ? 'active' : '' }}"><a href="{{url('importacao/verde')}}"><label class="label label-modulo-verde"> <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span></label> Recuperação</a></li>
        <li class="{{ Request::is('importacao/amarelo') ? 'active' : '' }}"><a href="{{url('importacao/amarelo')}}"><label class="label label-modulo-amarelo"> <span aria-hidden="true" class="glyphicon glyphicon-phone-alt"></span></label> Intensivo</a></li>
        <li class="{{ Request::is('importacao/vermelho') ? 'active' : '' }}"><a href="{{url('importacao/vermelho')}}"><label class="label label-modulo-vermelho"> <span aria-hidden="true" class="glyphicon glyphicon-alert"></span></label> Cobrança</a></li>
    </ul>
</li>
<li class="{{ Request::is('titulos*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-th-large'></i> <span>Módulos</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{url('titulos/modulo/azul')}}"><label class="label label-modulo-azul"> <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span></label> Prevenção</a></li>
        <li><a href="{{url('titulos/modulo/verde')}}"><label class="label label-modulo-verde"> <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span></label> Recuperação</a></li>
        <li><a href="{{url('titulos/modulo/amarelo')}}"><label class="label label-modulo-amarelo"> <span aria-hidden="true" class="glyphicon glyphicon-phone-alt"></span></label> Intensivo</a></li>
        <li><a href="{{url('titulos/modulo/vermelho')}}"><label class="label label-modulo-vermelho"> <span aria-hidden="true" class="glyphicon glyphicon-alert"></span></label> Cobrança</a></li>

    </ul>
</li>
<li class="{{ Request::is('avisos*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-comment'></i> <span>Avisos</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url('avisos') }}"><span aria-hidden="true" class="glyphicon glyphicon-inbox"></span>Avisos</a></li>
        <!-- <li><a href="{{ url('avisospendentes') }}">Avisos Pendentes</a></li> -->
        <li class="{{ Request::is('modeloAvisos*') ? 'active' : '' }}">
            <a href="{!! route('modeloAvisos.index') !!}"><i class="fa fa-edit"></i><span>Modelo de Avisos</span></a>
        </li>

        <li><a href="{{ url('avisos/create') }}"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>Enviar SMS para um Número</a></li>
    </ul>
</li>
@endrole
<!-- <li>
    <a href="{{ url('titulos') }}"><i class='glyphicon glyphicon-list-alt'></i> <span>Títulos</span></a>
    </li> -->
    @role('escola')
    <li>
        <a href="{{ url('alunos/2') }}"><i class='glyphicon glyphicon-user'></i> <span>Alunos</span></a>
    </li>
    @endrole

    <hr/>

    <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
        <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
    </li>

    <li class="{{ Request::is('empresas*') ? 'active' : '' }}">
        <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
    </li>

    <li class="{{ Request::is('titulos*') ? 'active' : '' }}">
        <a href="{!! route('titulos.index') !!}"><i class="fa fa-edit"></i><span>Titulos</span></a>
    </li>

    <li class="{{ Request::is('avisos*') ? 'active' : '' }}">
        <a href="{!! route('avisos.index') !!}"><i class="fa fa-edit"></i><span>Avisos</span></a>
    </li>

    <li class="{{ Request::is('avisosEnviados*') ? 'active' : '' }}">
        <a href="{!! route('avisosEnviados.index') !!}"><i class="fa fa-edit"></i><span>AvisosEnviados</span></a>
    </li>

    <li class="{{ Request::is('importacaos*') ? 'active' : '' }}">
        <a href="{!! route('importacaos.index') !!}"><i class="fa fa-edit"></i><span>Importacaos</span></a>
    </li>

    <li class="{{ Request::is('modeloAvisos*') ? 'active' : '' }}">
        <a href="{!! route('modeloAvisos.index') !!}"><i class="fa fa-edit"></i><span>ModeloAvisos</span></a>
    </li>

