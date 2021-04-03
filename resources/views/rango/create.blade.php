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
                        <h4 class="card-title">Añadir Rango</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('mioficina.rango.store') }}" method="POST"
                                enctype="multipart/form-data">
								{{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="nombre">Nombre</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="nombre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="act_directos">Activos Directos</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="act_directos"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="directores_diamante">Directores Diamante</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="directores_diamante">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="nivel">Nivel</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="nivel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="vol_grupal">Volumen Grupal</label>
                                                <div class="position-relative ">
                                                    <input type="number" class="form-control" name="vol_grupal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="estado">Estado</label>
                                                <div class="position-relative ">
                                                    <select name="estado" id="estado"
                                                    class="custom-select data-toggle="select">
                                                    <option value="0">Inactivo</option>
                                                    <option value="1">Activo</option>
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
                                                class="btn btn-secondary mr-1 mb-1 waves-effect waves-light">Añadir</button>
                                            <a href="{{ route('mioficina.tienda.list') }}"
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
