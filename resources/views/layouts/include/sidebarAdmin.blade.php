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
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                    <i class="feather icon-home"></i>
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('wallet.index')  }}">
                    <i class="feather icon-credit-card"></i>
                    <span class="title">Billetera</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('referraltree', ['tree'])}}" class="nav-link nav-toggle">
                    <i class="feather icon-git-merge"></i>
                    <span class="title">Árbol</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('shop.index')}}" class="nav-link nav-toggle">
                    <i class="feather icon-shopping-bag"></i>
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
                        <a href="{{ route('user.network.directs-record') }}" class="nav-link" >
                            <i class="feather icon-briefcase"></i>
                            <span class="title">Mi Negocio - Directos</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-left: 25px;">
                        <a href="{{ route('user.network.networks-record') }}" class="nav-link">
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
                <a href="{{ route('range.index') }}" class="nav-link nav-toggle">
                    <i class="feather icon-award"></i>
                    <span class="title">Rangos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-dollar-sign"></i>
                    <span class="title">Liquidaciones</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item" style="margin-left: 25px;">
                        <a href="{{ route('user.liquidations.pending') }}" class="nav-link" >
                            <i class="feather icon-briefcase"></i>
                            <span class="title">Liquidaciones Pendientes</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-left: 25px;">
                        <a href="{{ route('user.liquidations.record') }}" class="nav-link">
                            <i class="feather icon-briefcase"></i>
                            <span class="title">Liquidaciones Realizadas</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>