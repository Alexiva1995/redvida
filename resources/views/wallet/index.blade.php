@extends('layouts.dashboard')

@include('dashboard.componentView.optionDatatable')

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
                                        Ultimo Retiro
                                    </div>
                                    <div style="color: #34C900; font-size: 25px; font-weight: 700;">
                                        {{ number_format(Auth::user()->wallet_amount, 2, '.', ',') }}$
                                        <br>
                                        <a href="" class="btn btn-success btn-sm">Solicitar Retiro</a>

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


<div class="card">
    <div class="card-content">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table zero-configuration">
                    <thead>
                        <tr class="table-success">
                            <th>ID</th>
                            <th>Email</th>
                            <th>Descripcion</th>
                            <th>Monto (USD)</th>
                            {{-- <th>Estado</th> --}}
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($wallet as $item)
                        <tr class="text-center">

                            <td>{{ $item->id}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->description}}</td>

                            @if ($item->status == 0)
                            <td class="text-success font-weight-bolder">+ {{ $item->monto}} $</td>
                            @elseif ($item->status == 1)
                            <td class="text-danger font-weight-bolder">- {{ $item->monto}} $</td>
                            @endif

                            {{-- @if ($item->estado == 0)
                            <td>
                                <div class="chip btn-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">Retiro</div>
                                    </div>
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="chip btn-success">
                                    <div class="chip-body">
                                        <div class="chip-text">Ingreso</div>
                                    </div>
                                </div>
                            </td>
                            @endif --}}

                            <td>{{ $item->created_at}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection