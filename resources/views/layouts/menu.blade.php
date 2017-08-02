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

