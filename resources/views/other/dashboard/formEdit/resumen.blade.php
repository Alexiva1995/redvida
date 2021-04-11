<!-- Modal para la imagen -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Avatar</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>


            </div>

            <div class="modal-body">

                <div class="col-md-12 buq">

                    <form method="POST" action="{{ route('admin.user.actualizar', $data['principal']->ID) }}"
                        enctype="multipart/form-data">

                        {{ method_field('PUT') }}

                        {{ csrf_field() }}

                        <div class="form-group col-sm-12">

                            <label for="">Imagen del Usuario</label>

                            <input class="form-control form-control-solid placeholder-no-fix b-blue" type="file" name="avatar"
                                required style="background-color:f7f7f7;" accept="image/png, image/jpeg">

                        </div>

                        <div class="form-group col-sm-12 text-center" style="padding-left: 10px;">

                            <button class="btn btn-info" type="submit">Subir</button>

                        </div>

                    </form>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>

        </div>

    </div>

</div>