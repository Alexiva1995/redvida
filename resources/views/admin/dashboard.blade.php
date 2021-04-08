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
		  	var comisionesTotales = <?= json_encode($arrayCommissionsTotal) ?>;
		  	var comisionesPagadas = <?= json_encode($arrayCommissionsPaid) ?>;
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

  			// Doughnut Chart
  			// ---------------------------------------------
  			//Get the context of the Chart canvas element we want to select
  			var doughnutChartctx = $("#simple-doughnut-chart");

  			// Chart Options
  			var doughnutchartOptions = {
    			responsive: true,
    			maintainAspectRatio: false,
    			responsiveAnimationDuration: 500,
    			legend: {
		    		display: false,
		    	},
    			/*title: {
      				display: true,
      				text: 'Predicted world population (millions) in 2050'
    			}*/
  			};

			// Chart Data
			var doughnutchartData = {
			    labels: ["Activos", "Inactivos"],
			    datasets: [{
			      	label: "My First dataset",
			      	data: <?= json_encode($users) ?>,
			      	backgroundColor: ['#34C900', '#8B8B8B'],
			    }]
			};

		  	var doughnutChartconfig = {
		    	type: 'doughnut',
		    	// Chart Options
		    	options: doughnutchartOptions,
		    	data: doughnutchartData
		  	};

  			// Create the chart
  			var doughnutSimpleChart = new Chart(doughnutChartctx, doughnutChartconfig);
		});

		function copyReferralsLink(){   
            let copyText = $('#referrals_link').attr('data-link');
            const textArea = document.createElement('textarea');
            textArea.textContent = copyText;
            document.body.append(textArea);      
            textArea.select();      
            document.execCommand("copy");    
            textArea.remove();
        }

        function showUserDetail($user){
        	var date = new Date($user.created_at);
        	$("#user-id").html($user.ID);
        	$("#user-name").html($user.name);
        	$("#user-email").html($user.user_email);
        	$("#user-phone").html($user.phone);
        	$("#user-country").html($user.country);
        	$("#user-register-date").html(date.getDate() + "/"+ (date.getMonth()+1)+ "/" +date.getFullYear());
        	$("#user-referred").html($user.referred.user_email);
        	if ($user.status == 1){
        		$("#user-status").html('<span class="badge badge badge-success badge-pill" style="background-color: #34C900;">Activo</span>');
        	}else{
        		$("#user-status").html('<span class="badge badge badge-success badge-pill" style="background-color: #D50B21;">Inactivo</span>');
        	}
        	$("#userDetails").modal("show");
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
										<div class="col-3">
											<span>
												@if(!!Auth::user()->photoDB)
													<img class="round" src="{{ asset('product/'.Auth::user()->photoDB) }}" alt="avatar" height="50" width="50">
												@else
													<img class="round" src="{{ asset('img/avatar/avatar.png') }}" alt="avatar" height="50" width="50">
												@endif
											</span>
										</div>
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
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
				 	<div class="card-header">
					 	<div class="text-left" style="color: #3C3232; font-weight: 600; font-size: 20px;">
					 		Historial de Comisiones
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

			{{-- Tercera Columna--}}
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="card" style="min-height: 500px;">
					<div class="card-header">
						<div style="color: #3C3232; font-weight: 600; font-size: 20px;">
					 		Usuarios
	                    </div>
	                </div>
                    <div class="card-content">
                       	<div class="card-body">
                       		<div class="height-300">
                       			<canvas id="simple-doughnut-chart"></canvas>
                       		</div>
                       		<div class="row mt-3" style="color: #3C3232; font-weight: 500;">
                        		<div class="col-6">
                        			<i class="fa fa-circle font-small-3 mr-50" style="color: #34C900;"></i> Usuarios Activos
                        		</div>
                       			<div class="col-6 text-right">
                       				{{ $users[0] }}
                       			</div>
                       			<div class="col-6 mt-1">
				 					<i class="fa fa-circle font-small-3 mr-50" style="color: #8B8B8B;"></i> Usuarios Inactivos
				 				</div>
				 				<div class="col-6 mt-1 text-right">
				 					{{ $users[1] }}
				 				</div>
                        	</div>
                        </div>
                    </div>
                </div>
			</div>

			<div class="col-lg-6 col-md-12 col-sm-12" >
				<div class="card" style="min-height: 500px;">
					<div class="card-header">
					 	<div style="color: #3C3232; font-weight: 600; font-size: 20px;">
					 		Últimos Registros
	                    </div>
                    </div>
                    <div class="card-content">
                       	<div class="card-body">
                       		<div class="table-responsive ">
                                <table class="table zero-configuration">
                                   	<thead>
                                   		<tr>
                                   			<th>ID</th>
                                  			<th>NOMBRE</th>
                                   			<th>ACCIÓN</th>
                                   		</tr>
                                   	</thead>
                                  	<tbody>
                                    	@foreach ($lastRecords as $lastRecord)
	                                    	<tr>
	                                    		<td>{{ $lastRecord->ID }}</td>
	                                    		<td>{{ (!empty($lastRecord->display_name)) ? $lastRecord->display_name : $lastRecord->user_email }}</td>
	                                    		<td>
		                                    		<a href="javascript:;" style="color: #3C3232;" onclick="showUserDetail({{$lastRecord}});"><i class="fa fa-eye mr-50"></i></a>
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

			{{-- Cuarta Columna --}}
			<div class="col-lg-12 col-md-12 col-sm-12" >
				<div class="card">
					<div class="card-header">
						<div style="color: #3C3232; font-weight: 600; font-size: 20px;">
						 	Últimos pedidos
	                    </div>
	                </div>
                    <div class="card-content">
                        <div class="card-body">
                        	<div class="table-responsive ">
                                <table class="table zero-configuration">
                                    <thead>
                                    	<tr>
                                    		<th>ID</th>
                                    		<th>NOMBRE</th>
                                    		<th>FECHA</th>
                                    		<th>ESTADO</th>
                                    		<th>ACCIÓN</th>
                                    	</tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($lastOrders as $lastOrder)
	                                    	<tr>
	                                    		<td>{{ $lastOrder->id }}</td>
		                                    	<td>{{ (!is_null($lastOrder->user->display_name)) ? $lastOrder->user->display_name : $lastOrder->user->user_email }}</td>
		                                    	<td>{{ date('Y/m/d', strtotime($lastOrder->date)) }}</td>
		                                    	<td>
		                                    		@if ($lastOrder->status == 0)
		                                    			<span class="badge badge badge-warning badge-pill">Pendiente</span>
		                                    		@elseif ($lastOrder->status == 1)
														<span class="badge badge badge-success badge-pill" style="background-color: #34C900;">Completado</span>
													@else
														<span class="badge badge badge-success badge-pill" style="background-color: #D50B21;">Rechazado</span>
													@endif
		                                    	</td>
		                                    	<td class="text-center">
		                                    		<a href="" style="color: #3C3232;"><i class="fa fa-eye mr-50"></i></a>
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

	<div class="modal fade" id="userDetails" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Detalles de Usuario</h5>
					<button type="button" class="close btn btn-icon rounded-circle" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true" class="text-white">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<table class="table table-bordered">
	            		<tbody>
	            			<tr>
	            				<td>ID</td>
	            				<td class="text-bold-600" id="user-id"></td>
	            			</tr>
	            			<tr>
	            				<td>Nombre</td>
	            				<td class="text-bold-600" id="user-name"></td>
	            			</tr>
	            			<tr>
	            				<td>Correo Electrónico</td>
	            				<td class="text-bold-600" id="user-email"></td>
	            			</tr>
	            			<tr>
	            				<td>Teléfono</td>
	            				<td class="text-bold-600" id="user-phone"></td>
	            			</tr>
	            			<tr>
	            				<td>País</td>
	            				<td class="text-bold-600" id="user-country"></td>
	            			</tr>
	            			<tr>
	            				<td>Fecha de Registro</td>
	            				<td class="text-bold-600" id="user-register-date"></td>
	            			</tr>
	            			<tr>
	            				<td>Referido</td>
	            				<td class="text-bold-600" id="user-referred"></td>
	            			</tr>
	            			<tr>
	            				<td>Estado</td>
	            				<td class="text-bold-600" id="user-status"></td>
	            			</tr>
	            		</tbody>
	            	</table>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
