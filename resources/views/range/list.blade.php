@extends('layouts.dashboard')

@include('dashboard.componentView.optionDatatable')

@section('content')

<div class="card">
	<div class="card-content">
       
		<div class="card-body">
            <a href="{{ route('range.create') }}" class="btn btn-secondary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Rango</a>
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

                        @foreach ($range as $item)
                       <tr class="text-center">
                           <td>{{ $item->id}}</td>
                           @if ($item->photoDB != NULL)
                           <td><img src="{{asset('photo/'.$item->photoDB)}}" alt="photo" class="rounded-circle" width="70px" height="65px"></td>
                           @else
                           <td>No Tiene Imagen</td>
                           @endif
                           <td>{{ $item->name}}</td>
                           <td>{{ $item->act_direct}}</td>
                           <td>{{ $item->diamond_directors}}</td>
                           <td>{{ $item->level}}</td>
                           <td>{{ $item->group_vol}}</td>

                           @if ($item->status == '0')
                           <td> <a class=" btn btn-danger text-white text-bold-600">Inactivo</a></td>
                           @elseif($item->status == '1')
                           <td> <a class=" btn btn-success text-white text-bold-600">Activo</a></td>
                           @endif

                           <td>{{ $item->created_at}}</td>

                           <td>
                            <div class="row">
                                <div class="col-3">   
                            <a href="{{ route('range.edit',$item->id) }}" class="btn btn-sm btn-secondary text-bold-600">Editar</a>
                                </div>
                            <div class="col-3 ml-3">   

                           <form action="{{ route('range.delete', $item->id) }}" method="POST">
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