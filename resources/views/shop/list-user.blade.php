@extends('layouts.dashboard')

@include('dashboard.componentView.optionDatatable')

@section('content')

<div class="card">
    <div class="card-content">

        <div class="card-body">
            <a href="{{ route('shop.index') }}" class="btn btn-secondary mb-2 waves-effect waves-light"><i
                    class="feather icon-plus"></i>&nbsp; Comprar Producto</a>
            <div class="table-responsive">
                <table id="mytable" class="table zero-configuration">
                    <thead>
                        <tr class="table-success">
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Fecha de Compra</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product as $item)
                        <tr class="text-center">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->product}}</td>
                            <td>{{ $item->amount}}</td>
                            <td>{{ $item->price}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="{{ route('shop.show', $item->id) }}"
                                            class="btn btn-sm btn-secondary text-bold-600">Ver</a>
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