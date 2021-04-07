@extends('layouts.dashboard')

@push('scripts')
	<script type="text/javascript">
		$(window).on("load", function () {
			$('.zero-configuration').DataTable({
				dom: 'tp',
				ordering: false,
				pageLength : 6,
				language: {
					"paginate": {
						"first": "Primero",
						"last": "Ultimo",
						"next": "<i class='fas fa-angle-right'></i>",
						"previous": "<i class='fas fa-angle-left'></i>"
		            }	
		        },
			});

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
		  	var comisionesTotales = <?= json_encode($arrayComisionesTotales) ?>;
		  	var comisionesPagadas = <?= json_encode($arrayComisionesPagadas) ?>;
		  	var linechartData = {
		    	labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		    	datasets: [
		    	{
			      	label: "Comisiones Totales",
			      	data: comisionesTotales,
			      	borderColor:'#255EBA',
			      	fill: false
		    	},
		    	{
		    		label: "Comisiones Pagadas",
			      	data: comisionesPagadas,
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

		function copyReferralsLink(){   
			alert("Aqui");
            let copyText = $('#referrals_link').attr('data-link');
            const textArea = document.createElement('textarea');
            textArea.textContent = copyText;
            document.body.append(textArea);      
            textArea.select();      
            document.execCommand("copy");    
            textArea.remove();
        }
	</script>	
@endpush

@section('content')
	<div class="contai2">
		<div class="row">
			{{-- Primera Columna--}}
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="card bg-analytics text-white">
					<div class="card-content">
						<div class="card-body" style="background: linear-gradient(270.07deg, #E2FFD8 0.08%, #FFFFFF 99.95%);">
							<div class="row">
								<div class="col-6">
									<div class="row">
										<div class="col-3"><span><img class="round" src="{{ asset('img/avatar/'.Auth::user()->avatar) }}" alt="avatar" height="50" width="50"></span></div>
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
				                        	<button class="btn btn-success" data-link="http://localhost:8000/mioficina/autentication/register?referred_id={{Auth::user()->ID}}" id="referrals_link" onclick="copyReferralsLink();">Copiar link de referido <i class="far fa-copy"></i></button>
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
					                   	{{ number_format(Auth::user()->wallet_amount, 2, '.', ',') }}$
					                </div>
								</div>
								<div class="col-6">
									<img src="{{ asset('assets/imgLanding/billetera.png') }}" width="100%" height="180">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

			{{-- Segunda Columna--}}
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="card" style="min-height: 500px;">
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
                       		<div class="height-400">
                       			<canvas id="line-chart"></canvas>
                       		</div>
                       	</div>
                    </div>
                </div>
			</div>

			<div class="col-lg-6 col-md-12 col-sm-12" >
				<div class="card" style="min-height: 500px;">
					<div class="card-header">
					 	<div style="color: #3C3232; font-weight: 600; font-size: 20px;">
					 		Últimos registros directos
	                    </div>
                    </div>
                    <div class="card-content">
                       	<div class="card-body">
                       		<div class="table-responsive ">
                                <table class="table zero-configuration">
                                   	<thead>
                                   		<tr>
                                   			<th class="text-center">ID</th>
                                  			<th class="text-center">NOMBRE</th>
                                   			<th class="text-center">ESTADO</th>
                                   		</tr>
                                   	</thead>
                                  	<tbody>
                                    	@foreach ($ultRegistrosDirectos as $registroDirecto)
	                                    	<tr>
	                                    		<td class="text-center">{{ $registroDirecto->ID }}</td>
	                                    		<td class="text-center">{{ (!empty($registroDirecto->display_name)) ? $registroDirecto->display_name : $registroDirecto->user_email }}</td>
	                                    		<td class="text-center">
	                                    			@if ($registroDirecto->status == 1)
						                        		<i class="fa fa-circle font-small-3 text-success mr-50"></i> Activo
	                                    			@else
						                        		<i class="fa fa-circle font-small-3 text-danger mr-50"></i> Inactivo
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
			</div>
		</div>
	</div>
@endsection
