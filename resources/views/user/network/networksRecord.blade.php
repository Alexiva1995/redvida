@extends('layouts.dashboard')

@push('scripts')
	<script>
		$(window).on("load", function () {
			$('.zero-configuration').DataTable({
				dom: 'tp',
				order: [[ 3, "asc" ]],
				language: {
					"paginate": {
						"first": "Primero",
						"last": "Ultimo",
						"next": "<i class='fas fa-angle-right'></i>",
						"previous": "<i class='fas fa-angle-left'></i>"
		            }	
		        },
			});
		});
	</script>
@endpush

@section('breadcrumbs')
	<span class="breadcrumb-disabled">|</span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('user.dashboard') }}"><i class="fa fa-home"></i></a></span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-disabled">Inicio </span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('user.network.networks-record') }}">Mi Negocio - Organización</a></span>
@endsection

@section('content')
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table zero-configuration">
						<thead>
							<tr>
								<th>ID</th>
								<th>Correo</th>
								<th>Fecha de Ingreso</th>
								<th>Nivel</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($referidos as $referido)
								<tr>
									<td>{{ $referido->ID }}</td>
									<td>{{ $referido->user_email }}</td>
									<td>{{ date('d/m/Y', strtotime($referido->created_at)) }}</td>
									<td>{{ $referido->level }}</td>
									<td>
										@if ($referido->status == 1)
											<span class="badge badge badge-success badge-pill" style="background-color: #34C900;">Activo</span>
										@else
											<span class="badge badge badge-success badge-pill" style="background-color: #B1B1B1;">Inactivo</span>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

