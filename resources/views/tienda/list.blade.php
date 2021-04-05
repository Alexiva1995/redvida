@extends('layouts.dashboard')

@include('dashboard.componentView.optionDatatable')

@section('content')

<div class="card">
	<div class="card-content">
       
		<div class="card-body">
            <a href="{{ route('mioficina.tienda.create') }}" class="btn btn-secondary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Producto</a>
			<div class="table-responsive">
				<table id="mytable" class="table zero-configuration">
					<thead>
						<tr class="table-success">
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Valor Publico</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Accion</th>
						</tr>
					</thead>
                    <tbody>

                        @foreach ($producto as $item)
                       <tr class="text-center">
                           <td>{{ $item->id}}</td>
                           <td>{{ $item->id}}</td>
                           <td>{{ $item->producto}}</td>
                           <td>{{ $item->descripcion}}</td>
                           <td>{{ $item->cantidad}}</td>
                           <td>{{ $item->valor_publico}}</td>

                           @if ($item->estado == '0')
                           <td> <a class=" btn btn-info text-white text-bold-600">Inactivo</a></td>
                           @elseif($item->estado == '1')
                           <td> <a class=" btn btn-success text-white text-bold-600">Activo</a></td>
                           @elseif($item->estado == '2')
                           <td> <a class=" btn btn-warning text-white text-bold-600">Agotado</a></td>
                           @elseif($item->estado == '3')
                           <td> <a class=" btn btn-danger text-white text-bold-600">No disponible</a></td>
                           @endif

                           <td>{{ $item->created_at}}</td>

                           <td>
                            <div class="row">
                                <div class="col-3">   
                            <a href="{{ route('mioficina.tienda.edit',$item->id) }}" class="btn btn-sm btn-secondary text-bold-600">Editar</a>
                                </div>
                            <div class="col-3 ml-3">   

                           <form action="{{ route('mioficina.tienda.delete', $item->id) }}" method="POST">
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