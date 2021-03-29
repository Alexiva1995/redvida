<style>
   .text-small3{
      font-size: 1.74em !important;
   }
   @media screen and (max-width: 600px){
      .text-small3{
         font-size: 1.3em !important;
      }
   }
   @media screen and (max-width: 400px){
      .text-small3{
         font-size: 0.8em !important;
      }
   }
</style>

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar floating-nav navbar-with-menu navbar-light navbar-shadow" style="position:absolute">
   <div class="navbar-wrapper" style="background-color: #FFFFFF;">
      <div class="navbar-container content">
         <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
               <ul class="nav navbar-nav">
                  <li class="nav-item mobile-menu d-xl-none mr-auto">
                     <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ficon feather icon-menu"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <ul class="nav navbar-nav float-right">
               <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                     <div class="user-nav d-sm-flex d-none">
                        <span class="user-name text-bold-600" style="color: black;">
                           {{ Auth::user()->display_name }}
                        </span>
                        <span class="user-status" style="color: black;">
                           @if (Auth::user()->rol_id == 0)
                              Administrador
                           @else
                              Usuario
                           @endif
                        </span>
                     </div>
                     <span><img class="round" src="{{ asset('avatar/'.Auth::user()->avatar) }}" alt="avatar" height="40" width="40"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="{{ route('admin.user.edit') }}">
                        <i class="feather icon-user"></i>
                        Editar Perfil
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="feather icon-power"></i> Salir 
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- END: Header-->