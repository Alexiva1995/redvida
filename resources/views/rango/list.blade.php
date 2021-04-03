@extends('layouts.dashboard')

@include('dashboard.componentView.optionDatatable')

@section('content')

<div class="card">
	<div class="card-content">
       
		<div class="card-body">
            <a href="{{ route('mioficina.rango.create') }}" class="btn btn-secondary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Rango</a>
			<div class="table-responsive">
				<table id="mytable" class="table zero-configuration">
					<thead>
						<tr class="table-success">
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Activos Directos</th>
                            <th>Directores Diamante</th>
                            <th>Nivel</th>
                            <th>Volumen Grupal</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Accion</th>
						</tr>
					</thead>
                    <tbody>

                        @foreach ($rango as $item)
                       <tr class="text-center">
                           <td>{{ $item->id}}</td>
                           <td>{{ $item->id}}</td>
                           <td>{{ $item->nombre}}</td>
                           <td>{{ $item->act_directos}}</td>
                           <td>{{ $item->directores_diamante}}</td>
                           <td>{{ $item->nivel}}</td>
                           <td>{{ $item->vol_grupal}}</td>

                           @if ($item->estado == '0')
                           <td> <a class=" btn btn-danger text-white text-bold-600">Inactivo</a></td>
                           @elseif($item->estado == '1')
                           <td> <a class=" btn btn-success text-white text-bold-600">Activo</a></td>
                           @endif

                           <td>{{ $item->created_at}}</td>

                           <td>
                            <div class="row">
                                <div class="col-3">   
                            <a href="{{ route('mioficina.rango.edit',$item->id) }}" class="btn btn-sm btn-secondary text-bold-600">Editar</a>
                                </div>
                            <div class="col-3 ml-3">   

                           <form action="{{ route('mioficina.rango.delete', $item->id) }}" method="POST">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" class="btn btn-sm btn-danger"><i class="feather icon-trash"></i>Eliminar</button>
                        </form>
                    </div>
                </div>
                    
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