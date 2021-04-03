@extends('layouts.dashboard')

@push('page_css')

@endpush

@section('content')

<section id="columns">
    <div class="row">

        @foreach ( $producto as $item )
        @if ($item->estado == 1)
            
        <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex justify-content-center mt-2">
                        <img class="" src="https://images-na.ssl-images-amazon.com/images/I/81blwMhVV8L._AC_SL1500_.jpg" height="180" width="230" alt="Card">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title float-right">{{ $item->valor_publico }} Bs</h4>
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">{{ $item->producto }}</h6>
                            <p class="card-text">{{ $item->descripcion }}</p>
                        </div>
                        @if ($item->estado == 1)
                        <a href="#" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart mr-1"></i> Comprar</a>    
                        @elseif($item->estado == 2)
                        <a href="#" class="col-12 btn btn-lg btn-warning waves-effect waves-light"><i class="feather icon-alert-triangle mr-1"></i> Agotado</a> 
                        @elseif($item->estado == 3)
                        <a href="#" class="col-12 btn btn-lg btn-danger waves-effect waves-light"><i class="feather icon-alert-triangle mr-1"></i> No Disponible</a> 
                        @endif
                        
                    </div>
                </div>
        </div>
        @endif
        @endforeach

    </div>
</section>

@endsection

@push('custom_js')
<script>
   
</script>
@endpush