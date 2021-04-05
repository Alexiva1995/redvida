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
                                    <h4 class="mb-0" style="color: #6B6B6B; font-size: 16px; font-weight: bold;">Cambiar Contraseña</h4>
                                    <h6 class="mt-2 mb-2" style="color: #6B6B6B; font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Euismod ac amet, ut mauris vitae.</h6>

                                    <form class="forget-form" action="{{ route('autentication.save-new-password') }}" method="post">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="user_id" value="{{ $user_id}}">

                                        <div class="form-group">
                                            <label class="mb-1" for="password">Contraseña</label>
                                            <input type="password" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="password" id="password" minlength="8" required/>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="mb-1" for="password">Confirmar Contraseña</label>
                                            <input type="password" class="form-control form-control-solid placeholder-no-fix form-label-group" autocomplete="off" name="password_confirmation" id="password_confirmation" minlength="8" required/>
                                        </div>

                                        <button type="submit" class="btn" style="display: block; background-color: #34C900 !important; color: white; font-weight: bold; width: 100%;">Actualizar Contraseña</button>
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