<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true"
    style="background-color: #ffffff;">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <a class="navbar-brand" href="" href="" style="width: 100%; margin: 0px;">
                <div class="brand-logo2 text-center mt-2" style="width: 100%;">
                    <img src="{{ asset('assets/imgLanding/logo.png') }}" >
                </div>
            </a>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            style="background-color: #ffffff">
            <li class="nav-item">
                <a href="{{url('mioficina/admin')}}" class="nav-link nav-toggle">
                    <i class="feather icon-home"></i>
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('referraltree', ['tree'])}}" class="nav-link nav-toggle">
                    <i class="fas fa-code-branch"></i>
                    <span class="title">Árbol</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('mioficina.tienda')}}" class="nav-link nav-toggle">
                    <i class="fas fa-store-alt"></i>
                    <span class="title">Tienda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="feather icon-briefcase"></i>
                    <span class="title">Mi Negocio</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item" style="margin-left: 25px;">
                        <a href="{{ route('directrecords') }}" class="nav-link" >
                            <i class="feather icon-briefcase"></i>
                            <span class="title">Mi Negocio - Directos</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-left: 25px;">
                        <a href="{{ route('networkrecords') }}" class="nav-link">
                            <i class="feather icon-briefcase"></i>
                            <span class="title">Mi Negocio - Organización</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                    <i class="feather icon-user"></i>
                    <span class="title">Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('liquidacion.user.comision')}}" class="nav-link nav-toggle">
                    <i class="feather icon-activity"></i>
                    <span class="title">Liquidaciones</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="feather icon-log-out"></i>
                    <span class="title">Cerrar Sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            FIN CERRAR SESIÓN --}}
        </ul>
    </div>
</div>