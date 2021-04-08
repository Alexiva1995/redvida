@extends('layouts.dashboard')

@push('scripts')
    <script>
        function sendForm(){
            $("#avatar-form").submit();
        }
    </script>
@endpush

@section('breadcrumbs')
	<span class="breadcrumb-disabled">|</span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-disabled">Inicio </span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.edit-my-profile') }}">Editar Mi Perfil</a></span>
@endsection

@section('content')
	<section>
        <div class="row">
        	<!-- left menu section -->
        	<div class="col-md-3 mb-2 mb-md-0">
        		<ul class="nav nav-pills flex-column mt-md-0 mt-1">
        			<li class="nav-item">
        				<a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                    	<a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Cambiar Contraseña
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
            	<div class="card">
            		<div class="card-content">
            			<div class="card-body">
            				<div class="tab-content">
            					<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
            						<div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{ asset('img/avatar/'.Auth::user()->avatar) }}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="avatar">Subir nueva foto</label>
                                                <form action="{{ route('user.update-my-profile') }}" method="POST" enctype="multipart/form-data" id="avatar-form">
                                                    {{ csrf_field() }}
                                                    <input type="file" id="avatar" name="avatar" hidden onchange="sendForm();">
                                                </form>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Formatos permitidos: JPG, JPEG,PNG, WEBPM</small></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <form action="{{ route('user.update-my-profile') }}" method="POST">
                                    	{{ csrf_field() }}
                                    	<div class="row">
                                    		<div class="col-12">
                                    			<div class="form-group">
                                    				<div class="controls">
                                    					<label for="display_name">Nombre de Usuario</label>
                                                        <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Nombre de Usuario" value="{{ Auth::user()->display_name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="name">Nombres y Apellidos</label>
                                            			<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="birthdate">Fecha de Nacimiento</label>
                                            			<input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ Auth::user()->birthdate }}">
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="gender">Género</label>
                                            			<select class="form-control" id="gender" name="gender">
                                            				<option value="" @if (is_null(Auth::user()->gender)) selected @endif disabled>Seleccione una opción...</option>
                                            				<option value="F" @if (Auth::user()->gender == 'F') selected @endif>Femenino</option>
                                            				<option value="M" @if (Auth::user()->gender == 'M') selected @endif>Masculino</option>
                                            			</select>
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="phone">Teléfono</label>
                                            			<input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="country">País</label>
                                            			<input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}">
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="address">Dirección</label>
                                            			<input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="user-email">Correo Electrónico</label>
                                            			<input type="email" class="form-control" id="user_email" value="{{ Auth::user()->user_email }}" disabled>
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                    <p class="mb-0">
                                                    	Tu correo electrónico no está verificado. Por favor, revisa tu bandeja de correo.
                                                    </p>
                                                    <a href="javascript: void(0);">Reenviar confirmación</a>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            	<button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                	<form action="{{ route('user.update-my-profile') }}" method="POST">
                                		{{ csrf_field() }}
                                		<div class="row">
                                			<div class="col-12">
                                				<div class="form-group">
                                					<div class="controls">
                                						<label for="actual_password">Contraseña Actual</label>
                                                        <input type="password" class="form-control" id="actual_password" name="actual_password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="password">Nueva Contraseña</label>
                                            			<input type="password" name="password" id="password" class="form-control" minlength="8" required>
                                            		</div>
                                            	</div>
                                            </div>
                                            <div class="col-12">
                                            	<div class="form-group">
                                            		<div class="controls">
                                            			<label for="password_confirmation">Repita la Nueva Contraseña</label>
                                            			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" minlength="8" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            	<button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Guardar Cambios</button>
                                                <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                                            </div>
                                        </div>
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