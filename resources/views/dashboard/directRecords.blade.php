@extends('layouts.dashboard')

@section('content')
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="table-responsive">
					<table id="mytable" class="table zero-configuration">
						<thead>
							<tr class="text-center">
								<th>ID</th>
								<th>Correo</th>
								<th>Fecha de Ingreso</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($referidosDirectos as $referido)
								<tr class="text-center">
									<td>{{ $referido->ID }}</td>
									<td>{{ $referido->user_email }}</td>
									<td>{{ date('d-m-Y', strtotime($referido->created_at)) }}</td>
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