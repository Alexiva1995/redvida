@extends('layouts.dashboard')

@push('custom_js')
<script>

$(document).ready(function() {
       @if($range->photoDB != NULL)
             previewPersistedFile("{{asset('photo/'.$range->photoDB)}}", 'photo_preview');
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
                <h4 class="card-title">Editar Rango</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('range.update', $range->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="name">Nombre</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="name" value="{{ $range->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="act_direct">Activos Directos</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="act_direct" value="{{ $range->act_direct }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="diamond_directors">Directores Diamante</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="diamond_directors" value="{{ $range->diamond_directors }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="level">Nivel</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="level" value="{{ $range->level }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="group_vol">Volumen Grupal</label>
                                        <div class="position-relative ">
                                            <input type="number" class="form-control" name="group_vol" value="{{ $range->group_vol }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="h5" for="status">Estado</label>
                                        <div class="position-relative ">
                                            <select name="status" id="status"
                                            class="custom-select data-toggle="select">
                                            <option value="0" @if($range->status == '0') selected  @endif>Inactivo</option>
                                            <option value="1" @if($range->status == '1') selected  @endif>Activo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group col-12">
                                    <fieldset>
                                        <label class="h5" for="due_date">Imagen del Rango</label>
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
                                    <a href="{{ route('range.list') }}"
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
