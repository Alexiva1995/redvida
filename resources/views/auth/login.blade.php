@extends('layouts.login')

@section('content')
    <section class="row flexbox-container" style="background: url(http://localhost:8000/assets/imgLanding/fondo-redvida.png) no-repeat fixed center; background-size: cover; -webkit-background-size: cover;-moz-background-size: cover; -o-background-size: cover; ">
        <div class="col-12 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0" style="background-color: white;">
                    <div class="col-12 p-0">
                        <div class="card rounded-0 mb-0 p-2">
                            <div class="pt-50 pb-1 pb-2 text-center">
                                <img src="{{asset('assets/imgLanding/logo.png')}}" alt="branding logo">
                            </div>

                            {{-- alertas --}}
                            @include('dashboard.componentView.alert')

                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <div class="inicio">
                                        <h4 class="mb-0" style="color: #6B6B6B; font-size: 16px; font-weight: bold;">Iniciar Sesión</h4>
                                        <h6 class="mt-2 mb-3" style="color: #6B6B6B; font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Euismod ac amet, ut mauris vitae.</h6>
                                    </div>
                                    <div class="recuperar" style="display:none;">
                                        <h4 class="mb-0" style="color: #6B6B6B; font-size: 16px; font-weight: bold;">Recuperar Clave</h4>
                                        <h6 class="mt-2 mb-3" style="color: #6B6B6B; font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Euismod ac amet, ut mauris vitae.</h6>
                                    </div>
                                    {{-- registro --}}
                                    <form class="login-form inicio" method="POST" action="{{ route('autentication.post-login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label class="mb-1" for="user_email">Email</label>
                                            <input type="email" class="form-control form-control-solid placeholder-no-fix form-label-group"  autocomplete="on" name="user_email" id="user_email" value="{{ old('user_email') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1" for="password">Contraseña</label>
                                            <input type="password" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="password" id="password" minlength="8" required/>
                                        </div>

                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="" style="font-size: 12px; color: color: #6B6B6B;">Recordar datos</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-right">
                                                <a class="card-link" onclick="toggle()" href="javascript:;" style="font-size: 12px; color: #6B6B6B;">
                                                    Olvidé mi contraseña
                                                </a>
                                            </div>
                                        </div><br>

                                        <button type="submit" class="btn" style="display: block; background-color: #34C900 !important; color: white; font-weight: bold; width: 100%;">Ingresar</button>

                                        <div style="padding: 30px 0 0 0; font-size: 12px;" class="text-center">¿Aún no tienes una cuenta? <a href="{{route('autentication.register')}}" style=" color: #6B6B6B;; font-weight: bold;"><u>Regístrate</u></a></div>
                                    </form>
                                    {{-- reset password --}}
                                    <form class="forget-form recuperar" action="{{ route('autentication.send-password-mail') }}" method="post" style="display: none;">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="mb-1" for="user_email">Ingresa tu correo</label>
                                            <input type="email" class="form-control form-control-solid placeholder-no-fix form-label-group"  autocomplete="off" name="email" required/>
                                        </div>

                                        <div style="padding: 30px 0 0 0;">
                                            <button type="submit" class="btn" style="display: block; background-color: #34C900; color: white; width: 100%;">Recuperar Clave</button>
                                        </div>

                                        <div style="padding: 30px 0 0 0;" class="text-center"><a href="javascript:;" onclick="toggle()" style="font-size: 12px; color: #6B6B6B;">Regresar</a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
    function toggle() {
        $('.inicio').toggle('slow')
        $('.recuperar').toggle('slow')
    }
</script>
@endsection