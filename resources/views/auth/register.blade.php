@extends('layouts.login')

@section('content')
    @php $referred = null; @endphp
    @if ( request()->referred_id != null )
        @php
            $referred = DB::table('users')
                ->select('display_name')
                ->where('ID', '=', request()->referred_id)
                ->first();
        @endphp
    @endif

    <section class="row " style="background: url(http://localhost:8000/assets/imgLanding/fondo-redvida.png) no-repeat fixed center; background-size: cover; -webkit-background-size: cover;-moz-background-size: cover; -o-background-size: cover; ">
        <!--<img height="100" class="m-2" src="{{asset('assets/imgLanding/foto-logo.png')}}" alt="branding logo">-->
        <div class="col-12 d-flex justify-content-center mt-4 mb-4">
            <div class="card bg-authentication rounded-2 mb-0">
                <div class="row m-0" style="background-color: white;">
                    <div class="col-12 p-0">
                        <div class="card rounded-2 mb-0 p-2">
                            <div class="pt-50 pb-1 pb-2 text-center">
                                <img src="{{asset('assets/imgLanding/logo.png')}}" alt="branding logo">
                            </div>

                            {{-- alertas --}}
                            <div class="col-12">
                                @include('dashboard.componentView.alert')
                            </div>

                            {{-- <p >Fill the below form to create a new account.</p> --}}
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <h4 class="mb-0" style="color: #6B6B6B; font-size: 16px; font-weight: bold;">Registro</h4>
                                    <h6 class="mt-2 mb-3" style="color: #6B6B6B; font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Euismod ac amet, ut mauris vitae.</h6>

                                    @if ($referred != null)
                                        <p class="px-2 text-center">Referido por:<br> <strong>{{ $referred->display_name }}</strong> </p>
                                    @endif

                                    <form method="POST" action="{{ route('autentication.post-register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="mb-1" for="user_email">Correo</label>
                                            <input type="email" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="user_email" id="user_email" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1" for="user_email">Repetir Correo</label>
                                            <input type="email" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="user_email_confirmation" id="user_email_confirmation" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1" for="password">Contraseña</label>
                                            <input type="password" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="password" id="password" minlength="8" required/>
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1" for="password_confirmation">Repetir Contraseña</label>
                                            <input type="password" class="form-control form-control-solid placeholder-no-fix form-label-group"
                                                autocomplete="off" name="password_confirmation" id="password_confirmation" minlength="8" required/>
                                        </div>

                                        <div class="form-group">
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="terms" required>
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">
                                                        Acepto los términos y condiciones
                                                    </span>
                                                </div>
                                                <a href="#" target="_blank" style="color: #34C900;"> Ver términos y condiciones</a>
                                            </fieldset>
                                        </div>

                                        @if (request()->referred_id == null)
                                            <input type="hidden" name="referred_id" value="" />
                                        @else
                                            <input type="hidden" name="referred_id" value="{{ request()->referred_id }}" />
                                        @endif

                                        <br>
                                        <button type="submit" class="btn btn-success btn-block" style="background-color: #34C900 !important;">Registrarse</button>

                                        <div style="padding: 30px 0 0 0; font-size: 12px;" class="text-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}" style="color: #6B6B6B; font-weight: bold;"><u>Inicia Sesión</u></a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection