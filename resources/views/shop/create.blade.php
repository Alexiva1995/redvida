@extends('layouts.dashboard')

@push('custom_js')
<script>

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
                        <h4 class="card-title">Añadir Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('shop.store') }}" method="POST"
                                enctype="multipart/form-data">
								{{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="product">Producto</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="product">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="description">Descripcion</label>
                                                <div class="position-relative ">
                                                    <textarea type="textarea" class="form-control" name="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="amount">Cantidad</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="amount">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="preferred_value">Valor Preferente</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="preferred_value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="public_value">Valor Publico</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="public_value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="commissionable_pts_value">Valor Comisionable Puntos</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="commissionable_pts_value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="pts_compra_mensual">Puntos Compra Mensual</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="pts_compra_mensual">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="pts_compra_rangos">Puntos Compra Rangos</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="pts_compra_rangos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="pts_purchase_prizes">Puntos Compra Premios</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="pts_purchase_prizes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="purchase_pts_value">Valor Punto Compra</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="purchase_pts_value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="discount">Valor de Descuento</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="discount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="status">Estado</label>
                                                <div class="position-relative ">
                                                    <select name="status" id="status"
                                                    class="custom-select data-toggle="select">
                                                    <option value="0">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Agotado</option>
                                                    <option value="3">No disponible</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group col-12">
                                            <fieldset>
                                                <label class="h5" for="due_date">Imagen del Product</label>
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
                                                class="btn btn-secondary mr-1 mb-1 waves-effect waves-light">Añadir</button>
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
