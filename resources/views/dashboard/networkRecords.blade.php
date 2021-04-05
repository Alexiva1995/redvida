@extends('layouts.dashboard')

@push('scripts')
<script>
	//$(window).on("load", function () {
		var elemento = document.getElementById("et-mobile-navigation");
		console.log(elemento);
		elemento.addEventListener("click", function(evt){
			alert("prueba");
		});
	//});
	
</script>
@endpush
@section('content')
	<div class="card">
		<div class="card-header" id="et-mobile-navigation">
	        <h4 class="card-title" >Registro de Red</h4>
	        <button >Prueba</button>
	    </div>
		<div class="card-content">
			<div class="card-body">
				<div class="table-responsive">
					<table id="mytable" class="table zero-configuration">
						<thead>
							<tr class="text-center">
								<th>ID</th>
								<th>Nombre</th>
								<th>Correo</th>
								<th>Inversion Total</th>
								<th>Estato</th>
								<th>Nivel Matriz</th>
								<th>Ingreso</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($allReferido as $referido)
							<tr class="text-center">
								<td>{{ $referido['ID'] }}</td>
								<td>{{ $referido->display_name }}</td>
								<td>{{ $referido->user_email }}</td>
								<td>$ {{ $referido->inversion }}</td>
								@if ($referido['status'] == '0')
								<td>Inactive</td>
								@else
								<td>Active</td>
								@endif
								<td>
									@if($referido['nivel'] == 1)
									1
									@else
									{{$referido['nivel']}}
									@endif
								</td>
								<td>{{ date('d-m-Y', strtotime($referido->created_at)) }}</td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

