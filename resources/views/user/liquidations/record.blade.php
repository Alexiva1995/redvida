@extends('layouts.dashboard')

@push('scripts')
	<script>
		$(window).on("load", function () {
			$('.zero-configuration').DataTable({
				dom: 'tp',
				order: [[ 0, "desc" ]],
				language: {
					"paginate": {
						"first": "Primero",
						"last": "Ultimo",
						"next": "<i class='fas fa-angle-right'></i>",
						"previous": "<i class='fas fa-angle-left'></i>"
		            }	
		        },
		        drawCallback: function() {
	                $(".show").on('click', function(){
	                	var route = $(this).attr('data-route');
						$.ajax({
		                    type: "GET",
		                    url: route,
		                    success:function(ans){
		                    	$("#commissions-list").html(ans);   
		                    	$("#commissions-list-modal").modal("show");
		                    } 
		                }); 
					});
	            }
			});

			$(".show").on('click', function(){
				var route = $(this).attr('data-route');
				$.ajax({
                    type: "GET",
                    url: route,
                    success:function(ans){
                    	$("#commissions-list").html(ans);   
                    	$("#commissions-list-modal").modal("show");
                    } 
                }); 
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
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('user.liquidations.record') }}">Liquidaciones Historial</a></span>
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
								<th>Fecha de Solicitud</th>
								<th>Fecha de Proceso</th>
								<th>Referencia</th>
								<th>Estado</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($liquidations as $liquidation)
								<tr>
									<td>{{ $liquidation->id }}</td>
									<td>USD {{ $liquidation->amount }}</td>
									<td>{{ date('Y/m/d', strtotime($liquidation->date)) }}</td>
									<td>{{ date('Y/m/d', strtotime($liquidation->process_date)) }}</td>
									<td>{{ $liquidation->payment_ref }}</td>
									<td>
										@if ($liquidation->status == 1)
											<span class="badge badge badge-success badge-pill" style="background-color: #34C900;">Completada</span>
										@else
											<span class="badge badge badge-success badge-pill" style="background-color: #D50B21;">Reversada</span>
										@endif
									</td>
									<td>
										<a class="show" href="javascript:;" style="color: #3C3232;" data-route="{{ route('user.liquidations.show-commissions-list', $liquidation->id) }}"><i class="fa fa-eye mr-50" aria-hidden="true"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@include('user.liquidations.commissionsListModal')
@endsection