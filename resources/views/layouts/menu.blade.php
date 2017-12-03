<!-- Optionally, you can add icons to the links -->
<li class="{{ Request::is('home*') ? 'active' : '' }}"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></i> <span>{{ trans('message.home') }}</span></a></li>

@ability('admin', 'gerenciar-escolas|gerenciar-alunos')
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='glyphicon glyphicon-dashboard'></i> <span>Estatísticas</span></a></li>
<li class="{{ Request::is('escolas*') || Request::is('alunos*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-th-list'></i> <span>Cadastros</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        @ability('admin', 'gerenciar-escolas|gerenciar-alunos')
        <li class="{{ Request::is('escolas*') ? 'active' : '' }}"><a href="{{ url('escolas') }}"><i class='glyphicon glyphicon-education'></i>Escolas</a></li>
        @endability
        @ability('admin', 'gerenciar-escolas|gerenciar-alunos')
        <li class="{{ Request::is('alunos*') ? 'active' : '' }}"> <a href="{{ url('alunos') }}"><i class='glyphicon glyphicon-user'></i> <span>Alunos</span></a> </li>
        @endability
    </ul>
</li>
@endability
@ability('admin', 'gerenciar-usuarios')
<li class="{{ Request::is('users*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-user'></i><span> Acessos</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuários</span></a>
        </li>                
    </ul>
</li>
@endability

@ability('admin', 'importar-planilhas-*')
<li class="{{ Request::is('importacao*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-import'></i> <span>Importações</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        @ability('admin', 'importar-planilhas-azul')
        <li class="{{ Request::is('importacao/azul') ? 'active' : '' }}"><a href="{{url('importacao/azul')}}"><label class="label label-modulo-azul"> <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span></label> Preventiva</a></li>
        @endability
        @ability('admin', 'importar-planilhas-verde')
        <li class="{{ Request::is('importacao/verde') ? 'active' : '' }}"><a href="{{url('importacao/verde')}}"><label class="label label-modulo-verde"> <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span></label> Recuperação</a></li>
        @endability
        @ability('admin', 'importar-planilhas-amarelo')
        <li class="{{ Request::is('importacao/amarelo') ? 'active' : '' }}"><a href="{{url('importacao/amarelo')}}"><label class="label label-modulo-amarelo"> <span aria-hidden="true" class="glyphicon glyphicon-phone-alt"></span></label> Intensiva</a></li>
        @endability
        @ability('admin', 'importar-planilhas-vermelho')
        <li class="{{ Request::is('importacao/vermelho') ? 'active' : '' }}"><a href="{{url('importacao/vermelho')}}"><label class="label label-modulo-vermelho"> <span aria-hidden="true" class="glyphicon glyphicon-alert"></span></label> Cobrança</a></li>
        @endability
    </ul>
</li>
@endability

@ability('admin', 'visualizar-modulo-verde|visualizar-modulo-azul|visualizar-modulo-amarelo|visualizar-modulo-vermelho')
<li class="{{ Request::is('titulos*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-th-large'></i> <span>Módulos</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        @ability('admin', 'visualizar-modulo-azul')
        <li><a href="{{url('titulos/modulo/azul')}}"><label class="label label-modulo-azul"> <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span></label> Prevenção</a></li>
        @endability
        @ability('admin', 'visualizar-modulo-verde')
        <li><a href="{{url('titulos/modulo/verde')}}"><label class="label label-modulo-verde"> <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span></label> Recuperação</a></li>
        @endability
        @ability('admin', 'visualizar-modulo-amarelo')
        <li><a href="{{url('titulos/modulo/amarelo')}}"><label class="label label-modulo-amarelo"> <span aria-hidden="true" class="glyphicon glyphicon-phone-alt"></span></label> Intensiva</a></li>
        @endability
        @ability('admin', 'visualizar-modulo-vermelho')
        <li><a href="{{url('titulos/modulo/vermelho')}}"><label class="label label-modulo-vermelho"> <span aria-hidden="true" class="glyphicon glyphicon-alert"></span></label> Cobrança</a></li>
        @endability

    </ul>
</li>
@endability
@ability('admin', 'enviar-sms')
<li class="{{ Request::is('avisos*') ? 'active' : '' }} treeview">
    <a href="#"><i class='glyphicon glyphicon-comment'></i> <span>Disparos</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url('avisos') }}"><span aria-hidden="true" class="glyphicon glyphicon-comment"></span>Efetuar Envios</a></li>
        <!-- <li><a href="{{ url('avisospendentes') }}">Avisos Pendentes</a></li> -->
        <li class="{{ Request::is('modeloAvisos*') ? 'active' : '' }}">
            <a href="{!! route('modeloAvisos.index') !!}"><i class="fa fa-edit"></i><span>Cadastrar Mensagens</span></a>
        </li>


        <li><a href="{{ url('avisos/create') }}"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>Enviar SMS para um Número</a></li>
    </ul>
</li>
@endability

@ability('admin', 'criar-acordo')
<li class="{{ Request::is('acordos*') ? 'active' : '' }} treeview">
    <a href="{!! route('acordos.index') !!}"><i class="glyphicon glyphicon-book"></i><span>Acordos e Negociações</span><i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{!! route('acordos.index') !!}"><i class="fa fa-edit"></i><span>Contatos Efetuados</span></a></li>
        <li><a href="{!! route('acordos.create') !!}"><i class="fa fa-edit"></i><span>Entrar em Contato com Aluno</span></a></li>
    </ul>    
</li>
@endability
<!-- <li>
    <a href="{{ url('titulos') }}"><i class='glyphicon glyphicon-list-alt'></i> <span>Títulos</span></a>
    </li> -->
   <!--      <li>
        <a href="{{ url('alunos/2') }}"><i class='glyphicon glyphicon-user'></i> <span>Alunos</span></a>
    </li>

    <hr/>

    <li class="{{ Request::is('titulos*') ? 'active' : '' }}">
        <a href="{!! route('titulos.index') !!}"><i class="fa fa-edit"></i><span>Titulos</span></a>
    </li>

    <li class="{{ Request::is('avisosEnviados*') ? 'active' : '' }}">
        <a href="{!! route('avisosEnviados.index') !!}"><i class="fa fa-edit"></i><span>AvisosEnviados</span></a>
    </li>

    <li class="{{ Request::is('importacaos*') ? 'active' : '' }}">
        <a href="{!! route('importacaos.index') !!}"><i class="fa fa-edit"></i><span>Importacaos</span></a>
    </li>

    <li class="{{ Request::is('modeloAvisos*') ? 'active' : '' }}">
        <a href="{!! route('modeloAvisos.index') !!}"><i class="fa fa-edit"></i><span>ModeloAvisos</span></a>
    </li> -->

@ability('admin', 'visualizar-contatos')
<li class="{{ Request::is('contatos*') ? 'active' : '' }}">
    <a href="{!! route('contatos.index') !!}"><i class="fa fa-edit"></i><span>Contatos - Formulário Site</span></a>
</li>
@endability




<li class="{{ Request::is('historicos*') ? 'active' : '' }}">
    <a href="{!! route('historicos.index') !!}"><i class="glyphicon glyphicon-info-sign"></i><span>Historicos</span></a>
</li>

