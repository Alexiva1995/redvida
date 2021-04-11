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

            $('#confirm-text').on('click', function () {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Estás solicitando un retiro por "+{{Auth::user()->wallet_amount}}+"$",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Retirar!',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: 'Cancelar',
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        var route = $("#confirm-text").attr('data-route');
                        window.location = route;
                    }
                })
            });
        });
    </script>
@endpush

@section('content')
    <div class="contai2">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white ">
                    <div class="card-content">
                        <div class="card-body" style="background: linear-gradient(270.07deg, #E2FFD8 0.08%, #FFFFFF 99.95%);">
                            <div class="row">
                                <div class="col-5">
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
                                <div class="col-7">
                                    <img src="{{ asset('assets/imgLanding/billetera.png') }}" width="100%" height="167">
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
                                <div class="col-5">
                                    <div class="user-name mt-2" style="color: #3C3232; font-size: 20px; font-weight: 400;">
                                        Retiros
                                    </div>
                                    <div class="user-status mt-2" style="color: #A0A0A0; padding-top: 5px;">
                                        Último Retiro
                                    </div>
                                    <div style="color: #34C900; font-size: 25px; font-weight: 700;">
                                        @if (!is_null($lastRecord))
                                            {{ number_format($lastRecord->amount, 2, '.', ',') }}$ <span style="font-size: 15px; font-weight: 400; color: #3C3232;">{{ date('d M', strtotime($lastRecord->created_at)) }}</span>
                                        @else
                                            0.00$
                                        @endif
                                        <br>
                                        @if (!is_null(Auth::user()->wallet))
                                            @if (Auth::user()->wallet_amount > 0)
                                                <button type="button" class="btn btn-success btn-sm" data-route="{{ route('user.liquidations.store') }}" id="confirm-text">Solicitar Retiro</button>
                                            @else
                                                <button type="button" class="btn btn-success btn-sm" title="Debe tener saldo positivo en su billetera" disabled>Solicitar Retiro</button>
                                            @endif
                                        @else
                                            <button type="button" class="btn btn-success btn-sm" title="Debe configurar una billetera en su cuenta" disabled>Solicitar Retiro</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-7">
                                    <img src="{{ asset('assets/imgLanding/laptop.png') }}" width="100%" height="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

        </div> 
    </div> 

    <div class="redvida-div-table">
        <table class="table zero-configuration">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>WALLET</th>
                    <th>DESCRIPCIÓN</th>
                    <th>MONTO</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wallet as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ date('Y/m/d', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->wallet_used }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @if ($item->operation_type == 'Crédito')
                                <span class="text-success font-weight-bolder">+ {{ $item->amount}}$</span>
                            @else
                                <span class="text-danger font-weight-bolder">- {{ $item->amount}}$</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 0)
                                <span class="badge badge badge-warning badge-pill">Pendiente</span>
                            @elseif ($item->status == 1)
                                <span class="badge badge badge-success badge-pill" style="background-color: #34C900;">Completada</span>
                            @else
                                <span class="badge badge badge-danger badge-pill" style="background-color: #D50B21;">Reversada</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection