<div class="row">
        <nav class="navbar verde" id="barra-superior">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-left">
                @if (Auth::check())
                    <li><a href="{{ url('/home') }}">Admin</a></li>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endif
                <li><a class="link-icon" href="tel:+55 14 991 765 678">
                    <span class="vertical-helper"></span>
                    <span class="glyphicon glyphicon-earphone vertical-helper" aria-hidden="true"></span>
                    <span class="center-vertical">(14) 991 765 678</span>
                </a> </li>      
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#empresa">A Empresa</a></li>
                <li><a href="#modulos">Como Funciona</a></li>
                <li><a href="#contato">Contato</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>