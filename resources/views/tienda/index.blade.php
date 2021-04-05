@extends('layouts.dashboard')

@push('page_css')

@endpush

@section('content')

<section id="columns">
    <div class="row">

        @foreach ( $product as $item )
        @if ($item->status == 1)
            
        <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex justify-content-center mt-2">
                        <img class="" src="{{asset('product/'.$item->photoDB)}}" height="180" width="230" alt="Card">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title float-right">{{ $item->public_value }} Bs</h4>
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">{{ $item->product }}</h6>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        @if ($item->status == 1)
                        <a href="#" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart mr-1"></i> Comprar</a>    
                        @elseif($item->status == 2)
                        <a href="#" class="col-12 btn btn-lg btn-warning waves-effect waves-light"><i class="feather icon-alert-triangle mr-1"></i> Agotado</a> 
                        @elseif($item->status == 3)
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