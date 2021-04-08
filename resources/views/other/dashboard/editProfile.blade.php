@extends('layouts.dashboard')

@section('content')
<style>
    .nav-vertical .nav.nav-tabs .nav-item .nav-link.active::after{
        left: 90% !important;
        background: #02E9FE !important;
    }
    .nav.nav-tabs .nav-item .nav-link.active{
        color: #000000 !important;
    }
    .nav-vertical .nav.nav-tabs.nav-left ~ .tab-content .tab-pane{
        overflow-y: initial !important;
    }
</style>


<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="nav-vertical">
                <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal-tab1" data-toggle="tab"
                            aria-controls="personal" href="#personal" role="tab"
                            aria-selected="true">Datos Personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contacto-tab2" data-toggle="tab"
                            aria-controls="contacto" href="#contacto" role="tab"
                            aria-selected="false">Contacto</a>
                    </li>
                </ul>
                <!-- Aquí es informacion personal -->

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="row">
                            
                        </div>
                    </div>
                    <!-- termina informacion personal -->
                    <!-- Empieza Pagos -->
                    <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
                        {{-- @include('dashboard.formEdit.pago', ['controler' => $data['controler']]) --}}
                        <div class="row">
                           
                        </div>
                    </div>
                    <!-- Termina Pago -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection