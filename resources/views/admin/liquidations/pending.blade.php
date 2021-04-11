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

        function processLiquidation($liquidation, $status){
            $("#status").val($status);
            $("#liquidation_id").val($liquidation.id);
            $("#user").html($liquidation.user.user_email);
            $("#wallet").html($liquidation.wallet);
            $("#amount").html($liquidation.amount);
            if ($status == 1){
                $("#modal-title").html("Aprobar Liquidación");
                $("#reverse_form_div").css('display', 'none');
                $("#liquidate_form_div").css('display', 'block');
                $("#reverse_comment").prop('required', false);
                $("#payment_ref").prop('required', true);
                $("#btn-submit").html("Aprobar");
            }else{
                $("#modal-title").html("Reversar Liquidación");
                $("#liquidate_form_div").css('display', 'none');
                $("#reverse_form_div").css('display', 'block');
                $("#payment_ref").prop('required', false);
                $("#reverse_comment").prop('required', true);  
                $("#btn-submit").html("Reversar");
            }
            $("#process-modal").modal("show");
        }
    </script>
@endpush

@section('breadcrumbs')
    <span class="breadcrumb-disabled">|</span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-disabled">Inicio </span>
    <span class="ml-2 breadcrumb-disabled"><i class="fas fa-chevron-right"></i></span>
    <span class="ml-2 breadcrumb-enabled"><a href="{{ route('admin.liquidations.pending') }}">Liquidaciones Pendientes</a></span>
@endsection

@section('content')
    <div class="redvida-div-table">
        <table class="table zero-configuration" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>MONTO (USD)</th>
                    <th>BILLETERA</th>
                    <th class="text-center">ACCIÓN</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($liquidations as $liquidation)
                    <tr>
                        <td>{{ $liquidation->id }}</td>
                        <td>{{ (!is_null($liquidation->user->name)) ? $liquidation->user->name : $liquidation->user->user_email }}</td>
                        <td>{{ $liquidation->amount }}</td>
                        <td>{{ $liquidation->wallet }}</td>
                        <td class="text-center">
                            <a href="javascript:;" onclick="processLiquidation({{ $liquidation }}, 1);"><i class="fa fa-check icon-green" aria-hidden="true"></i></a>
                            <a href="javascript:;" onclick="processLiquidation({{ $liquidation }}, 2);"><i class="fas fa-reply icon-red" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.liquidations.processModal')
@endsection