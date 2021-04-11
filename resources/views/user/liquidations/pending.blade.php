@extends('layouts.dashboard')

@push('scripts')
	<script>
		$(window).on("load", function () {
			$('.zero-configuration').DataTable({
				dom: 'tp',
				order: [[ 3, "desc" ]],
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
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('user.liquidations.pending') }}">Liquidaciones Pendientes</a></span>
@endsection

@section('content')
	<div class="redvida-div-table">
		<table class="table zero-configuration">
			<thead>
				<tr>
					<th>#</th>
					<th>Monto (USD)</th>
					<th>Billetera</th>
					<th>Fecha de Solicitud</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($liquidations as $liquidation)
					<tr>
						<td>{{ $liquidation->id }}</td>
						<td>{{ $liquidation->amount }}</td>
						<td>{{ $liquidation->wallet }}</td>
						<td>{{ date('Y/m/d', strtotime($liquidation->date)) }}</td>
						<td>
							<a class="show" href="javascript:;" style="color: #3C3232;" data-route="{{ route('user.liquidations.show-commissions-list', $liquidation->id) }}"><i class="fa fa-eye mr-50" aria-hidden="true"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	@include('user.liquidations.commissionsListModal')
@endsection