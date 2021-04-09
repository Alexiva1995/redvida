<div class="modal fade" id="process-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">Aprobar Liquidación</h5>
				<button type="button" class="close btn btn-icon rounded-circle" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.liquidations.update')}}" method="POST">
            	<div class="modal-body">
                	{{ csrf_field() }}
                	<input type="hidden" name="liquidation_id" id="liquidation_id">
                	<input type="hidden" name="status" id="status">
                	
                	<table class="table table-bordered">
	            		<tbody>
	            			<tr>
	            				<td>Usuario</td>
	            				<td class="text-bold-600" id="user"></td>
	            			</tr>
	            			<tr>
	            				<td>Billetera</td>
	            				<td class="text-bold-600" id="wallet"></td>
	            			</tr>
	            			<tr>
	            				<td>Monto (USD)</td>
	            				<td class="text-bold-600" id="amount"></td>
	            			</tr>
	            		</tbody>
	            	</table>

	            	<div id="liquidate_form_div">
	            		<div class="form-group">
	                  		<label for="payment_ref"># de Referencia (*)</label>
	                  		<input class="form-control" name="payment_ref" id="payment_ref"/>
	              		</div>
	                	<div class="form-group">
	                    	<label for="comment">Comentario</label>
	                    	<textarea class="form-control" name="comment" id="comment"></textarea>
	                	</div>
	            	</div>

	            	<div id="reverse_form_div" style="display: none;">
	                	<div class="form-group">
	                    	<label for="reverse_comment">Comentario (*)</label>
	                    	<textarea name="reverse_comment" id="reverse_comment" class="form-control"></textarea>
	                	</div>
	            	</div>
	            </div>
	            <div class="modal-footer">
	            	<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
	            	<button type="submit" class="btn btn-success" id="btn-submit">Aprobar</button>
	            </div>
	        </form>
        </div>
    </div>
</div>