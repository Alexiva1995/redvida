@extends('layouts.dashboard')

@push('custom_js')
<script>

 $(document).ready(function() {
       @if($product->photoDB != NULL)
             previewPersistedFile("{{asset('product/'.$product->photoDB)}}", 'photo_preview');
         @endif
     });

  function previewFile(input, preview_id) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $("#" + preview_id).attr('src', e.target.result);
              $("#" + preview_id).css('height', '300px');
              $("#" + preview_id).parent().parent().removeClass('d-none');
          }
          $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
          reader.readAsDataURL(input.files[0]);
      }
  }

  function previewPersistedFile(url, preview_id) {
      $("#" + preview_id).attr('src', url);
      $("#" + preview_id).css('height', '300px');
      $("#" + preview_id).parent().parent().removeClass('d-none');

  }

</script>
@endpush

@section('content')

<div class="row d-flex justify-content-center mt-5 pb-3">
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Editar Producto</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('shop.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="product">Producto</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="product"
                                            value="{{ $product->product }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="desdescriptioncripcion">Descripcion</label>
                                        <div class="position-relative ">
                                            <textarea type="textarea" class="form-control" name="description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="amount">Cantidad</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="amount"
                                            value="{{ $product->amount }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="preferred_value">Valor Preferente</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="preferred_value"
                                            value="{{ $product->preferred_value }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="public_value">Valor Publico</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="public_value"
                                            value="{{ $product->public_value }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="commissionable_pts_value">Valor Comisionable Puntos</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="commissionable_pts_value"
                                            value="{{ $product->commissionable_pts_value }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="pts_buy_monthly">Puntos Compra Mensual</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="pts_buy_monthly"
                                            value="{{ $product->pts_buy_monthly }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="pts_purchase_ranges">Puntos Compra Rangos</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="pts_purchase_ranges"
                                            value="{{ $product->pts_purchase_ranges }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="pts_purchase_prizes">Puntos Compra Premios</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="pts_purchase_prizes"
                                            value="{{ $product->pts_purchase_prizes }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="purchase_pts_value">Valor Punto Compra</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="purchase_pts_value" 
                                            value="{{ $product->purchase_pts_value }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="status">Estado</label>
                                        <div class="position-relative ">
                                            <select name="status"
                                            class="custom-select">
                                            <option value="0" @if($product->status == '0') selected  @endif>Inactivo</option>
                                            <option value="1" @if($product->status == '1') selected  @endif>Activo</option>
                                            <option value="2" @if($product->status == '2') selected  @endif>Agotado</option>
                                            <option value="3" @if($product->status == '3') selected  @endif>No disponible</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group col-12">
                                    <fieldset>
                                        <label class="h5" for="due_date">Imagen del Producto</label>
                                        <div class="media">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="photo"><b>Seleccione una imagen para el Cliente</b></label>
                                                <input type="file" id="photo"
                                                    class="custom-file-input @error('photo') is-invalid @enderror"
                                                    name="photo" onchange="previewFile(this, 'photo_preview')"
                                                    accept="image/*">
                                            </div>
                                        </div>
                      
                                        <div class="row mb-4 mt-4 d-none" id="photo_preview_wrapper">
                                            <div class="col"></div>
                                            <div class="col-auto">
                                              <img id="photo_preview" class="img-fluid rounded" />
                                            </div>
                                            <div class="col"></div>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-secondary mr-1 mb-1 waves-effect waves-light">Editar</button>
                                    <a href="{{ route('shop.list') }}"
                                        class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
