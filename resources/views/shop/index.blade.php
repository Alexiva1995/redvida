@extends('layouts.dashboard')

@push('page_css')

@endpush

@section('content')

<section id="columns">
    <div class="row">

        @foreach ( $product as $item )
        @if ($item->status == 1)
        
        <div class="col-4">
            <form action="{{ route('shop.save') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" value="{{ $item->id }}" class=" d-none" name="id">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex justify-content-center mt-2">
                        <img class="" src="{{asset('product/'.$item->photoDB)}}" height="180" width="230" alt="Card">
                        </div>
                        <div class="card-body">
                            @if ($total == 1 && $item->discount != NULL )
                            <h4 class="card-title float-right"><small><strike>{{ $item->public_value }} $</strike></small> <sup>{{ $item->discount }}%</sup><br> {{ $item->public_value - $item->discount / 100 * $item->public_value }} $</h4>
                            <input type="text" value="{{ $item->public_value - $item->discount / 100 * $item->public_value }}" class=" d-none" name="public_value">
                            @else
                            <h4 class="card-title float-right">{{ $item->public_value }} $</h4>
                            <input type="text" value="{{ $item->public_value }}" class=" d-none" name="public_value">
                            @endif
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">{{ $item->product }}</h6>
                            <input type="text" value="{{ $item->product }}" class=" d-none" name="product">
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        @if ($user->wallet_amount >= $item->public_value)
                        {{-- @if ($item->status == 1) --}}
                        <button type="submit" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart    mr-1"></i> Comprar</button>    
                        @else
                        <button type="submit" class="col-12 btn btn-lg btn-danger waves-effect waves-light"><i class="feather icon-alert-circle    mr-1"></i> Saldo Insuficiente</button> 
                        @endif
                        {{-- @elseif($item->status == 2)
                        <a href="#" class="col-12 btn btn-lg btn-warning waves-effect waves-light"><i class="feather icon-alert-triangle mr-1"></i> Agotado</a> 
                        @elseif($item->status == 3)
                        <a href="#" class="col-12 btn btn-lg btn-danger waves-effect waves-light"><i class="feather icon-alert-triangle mr-1"></i> No Disponible</a> 
                        @endif --}}
                        
                    </div>
                </div>
            </form>
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