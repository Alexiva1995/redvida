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
                }
            });
        });
    </script>
@endpush

@section('breadcrumbs')
    <span class="breadcrumb-disabled">|</span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-disabled">Inicio </span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.liquidations.completed') }}">Liquidaciones Realizadas</a></span>
@endsection

@section('content')
    <div class="redvida-div-table">
        <table class="table zero-configuration" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>FECHA</th>
                    <th>MONTO (USD)</th>
                    <th>REFERENCIA</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($liquidations as $liquidation)
                    <tr>
                        <td>{{ $liquidation->id }}</td>
                        <td>{{ (!is_null($liquidation->user->name)) ? $liquidation->user->name : $liquidation->user->user_email }}</td>
                        <td>{{ date('Y/m/d', strtotime($liquidation->process_date)) }}</td>
                        <td>{{ $liquidation->amount }}</td>
                        <td>{{ $liquidation->payment_ref }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection