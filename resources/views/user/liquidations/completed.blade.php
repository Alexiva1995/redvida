@extends('layouts.dashboard')

@push('scripts')
	<script>
		$(window).on("load", function () {
			$('.zero-configuration').DataTable({
				dom: 'tp',
				order: [[ 2, "desc" ]],
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
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('user.liquidations.completed') }}">Liquidaciones Realizadas</a></span>
@endsection

@section('content')
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table zero-configuration">
						<thead>
							<tr>
								<th>#</th>
								<th>Monto (USD)</th>
								<th>Fecha</th>
								<th>Referencia</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($liquidaciones as $liquidacion)
								<tr>
									<td>{{ $liquidacion->id }}</td>
									<td>USD {{ $liquidacion->amount }}</td>
									<td>{{ date('Y/m/d', strtotime($liquidacion->date)) }}</td>
									<td>{{ $liquidacion->payment_ref }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection