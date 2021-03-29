@extends('layouts.dashboard')

@push('scripts')
	<script>
		$(window).on("load", function () {
			//Get the context of the Chart canvas element we want to select
  			var lineChartctx = $("#line-chart");

		  	// Chart Options
		  	var linechartOptions = {
		    	responsive: true,
		    	maintainAspectRatio: false,
		    	legend: {
		    		display: false,
		      		position: 'top',
		    	},
		    	hover: {
		      		mode: 'label'
		    	},
		    	scales: {
		     		xAxes: [{
		        		display: true,
		        		gridLines: {
		          		color: '#dae1e7',
		        	},
		        	scaleLabel: {
		          		display: true,
		        	}
		      	}],
		     	yAxes: [{
		        	display: true,
		        	gridLines: {
		          		color: '#dae1e7',
		        	},
		        	scaleLabel: {
		          		display: true,
		        	}
		      	}]
		    }
		  	};

		  	// Chart Data
		  	var linechartData = {
		    	labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
		    	datasets: [
		    	{
			      	label: "Africa",
			      	data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
			      	borderColor:'#255EBA',
			      	fill: false
		    	},
		    	{
			      	data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
			      	label: "Asia",
			      	borderColor: '#34C900',
			      	fill: false
		    	}]
		  	};

			var lineChartconfig = {
			    type: 'line',
			    // Chart Options
			    options: linechartOptions,
			    data: linechartData
			};

  			// Create the chart
  			var lineChart = new Chart(lineChartctx, lineChartconfig);
		});
	</script>	
@endpush
@section('content')
	<div class="contai2">
		<div class="row">
			{{-- primeros cuadro --}}
			@if (Auth::user()->rol_id == 0)
				@include('dashboard.componenteIndex.admin_square')
			@else
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="card bg-analytics text-white">
						<div class="card-content">
							<div class="card-body" style="background: linear-gradient(270.07deg, #E2FFD8 0.08%, #FFFFFF 99.95%);">
								<div class="row">
									<div class="col-6">
										<div class="row">
											<div class="col-3"><span><img class="round" src="{{ asset('avatar/'.Auth::user()->avatar) }}" alt="avatar" height="50" width="50"></span></div>
											<div class="col-9">
												<div class="user-name text-bold-600" style="color:  #3C3232;">
					                           		{{ Auth::user()->display_name }}
					                        	</div>
					                        	<div class="user-status" style="color: #A0A0A0; padding-top: 5px;">
						                           	@if (Auth::user()->rol_id == 0)
						                              	Administrador
						                           	@else
						                              	Usuario
						                           	@endif
						                        </div>
					                        </div>
					                        <div class="col-12 mt-2">
					                        	<div class="user-name" style="color: #3C3232; font-weight: 500;">Estado</div>
					                        	<div class="user-status" style="color: #A0A0A0; padding-top: 5px;">
					                        		@if (Auth::user()->status == 1)
					                        			<i class="fa fa-circle font-small-3 text-success mr-50"></i> Activo
					                        		@else
					                        			<i class="fa fa-circle font-small-3 text-danger mr-50"></i> Inactivo
					                        		@endif
					                        	</div>
					                        </div>
					                        <div class="col-12 mt-2">
					                        	<button class="btn btn-success">Copiar link de referido <i class="far fa-copy"></i></button>
					                        </div>
										</div>
									</div>
									<div class="col-6">
										<img src="{{ asset('assets/imgLanding/referido.webp') }}" width="100%" height="180">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-lg-6 col-md-12 col-sm-12">
					<div class="card bg-analytics text-white">
						<div class="card-content">
							<div class="card-body" style="background: linear-gradient(270.07deg, #E2FFD8 0.08%, #FFFFFF 99.95%);">
								<div class="row">
									<div class="col-6">
										<div class="user-name mt-2" style="color: #3C3232; font-size: 20px; font-weight: 400;">
					                        Billetera
					                    </div>
					                    <div class="user-status mt-2" style="color: #A0A0A0; padding-top: 5px;">
					                    	Saldo Actual
					                    </div>
					                    <div style="color: #34C900; font-size: 25px; font-weight: 700;">
					                    	{{ Auth::user()->wallet_amount }}$
					                    </div>
									</div>
									<div class="col-6">
										<img src="{{ asset('assets/imgLanding/billetera.webp') }}" width="100%" height="180">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 

				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
					 	<div class="card-header">
					 		<div class="text-left" style="color: #3C3232; font-weight: 600; font-size: 20px;">
					 			Últimas Comisiones
					 		</div>
					 		<div class="text-right">
					 			<i class="fa fa-circle font-small-3 mr-50" style="color: #255EBA;"></i> Comisiones Totales
					 			<i class="fa fa-circle font-small-3 mr-50 ml-50" style="color: #34C900;"></i> Comisiones Pagadas
					 		</div>
                        </div>
                        <div class="card-content">
                        	<div class="card-body pl-0">
                        		<div class="height-300">
                        			<canvas id="line-chart"></canvas>
                        		</div>
                        	</div>
                        </div>
                    </div>
				</div>
			@endif
			{{-- secundo cuadro --}}
			@if ($data['paquete'] == 0)
				@include('dashboard.componenteIndex.modalGold')
			@endif
			{{-- tecer cuadro --}}
			{{-- @include('dashboard.componenteIndex.third_square') --}}
		</div>
	</div>
@endsection

@push('custom_js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('assets/scripts/graficas.js')}}"></script>

<script type="text/javascript">
	function copyToClipboard(element) {
		var aux = document.createElement("input");
		aux.setAttribute("value", document.getElementById(element).innerHTML.replace('&amp;', '&').trim());
		document.body.appendChild(aux);
		aux.select();
		document.execCommand("copy");
		document.body.removeChild(aux);
		Swal.fire({
			title: '¡Link Copiado!',
			text: "Su link de referido esta listo para pegar",
      		type: "success",
			confirmButtonClass: 'btn btn-primary',
			buttonsStyling: false,
			}).then((value) => {
				if (value) {
					window.location.reload()
				}
			})
	}

	/**
	* Permite modificar el lado binario donde se van a ir registrando los usuarios
	*/
	function updateSideBinary(value) {
		let url = "{{route('change.side')}}"
		let valor = value
		let data = {
			ladoregistrar: valor,
			_token: "{{ csrf_token() }}",
		}
		let lado = (valor == 'D') ? 'Derecha' : 'Izquierda'
		$.post(url, data, function(response){
			if (response = 1) {
				Swal.fire({
				title: 'Lado Binario Actualizado',
				text: "Su nuevo lado de registro binario es por la "+ lado,
				type: "success",
				confirmButtonClass: 'btn btn-primary',
				buttonsStyling: false,
				}).then((value) => {
					if (value) {
						copyToClipboard('copy')
					}
				})
			}else{
				Swal.fire({
				title: 'Error',
				text: "No se pudo actualizar el lado a registrar intente de nuevo",
				type: "danger",
				confirmButtonClass: 'btn btn-primary',
				buttonsStyling: false,
			}).then((value) => {
				if (value) {
					window.location.reload()
				}
			})
			}
		})
	}

	function fbs_click(publi) {
		u=publi.img;
		// t=document.title;
   		t=publi.title
		let urlCom = "{{route('publicidad.compartido')}}"
		let url = 'http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t)
   		window.open(url, 'sharer', 'toolbar=0,status=0,width=626,height=436')
		data = {
			id: publi.id,
			social: 'facebook',
			_token: '{{ csrf_token() }}'
        }
		$.post(urlCom, data, function(){
			alert('compartido')
			window.location.reload()
		})
		return false;
	}
</script>

@if ($data['paquete'] == 0)
<script>
	$(document).ready(function(){
		$('#myModalGold').modal('show')
	})
</script>
@endif
@endpush

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endpush

@push('page_vendor_js')
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
@endpush