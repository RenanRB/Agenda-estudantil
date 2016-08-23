<div id="horariosModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h1>Cadastro de Horários</h1>
	  </div>
	  <div class="modal-body">
		<div class="col-lg-12">
		  </br></br>
			<div class="row"> 
				<form class="form-horizontal" action="cadastrar_horarios.php" method="POST">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="hr_inicial">Horário Inicial</label>  
				  <div class="col-md-4">
				  <input id="hr_inicial" name="hr_inicial" type="text" placeholder="" class="form-control input-md hour">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="hr_final">Horário Final</label>  
				  <div class="col-md-4">
				  <input id="hr_final" name="hr_final" type="text" placeholder="" class="form-control input-md hour">
					
				  </div>
				</div>
			  <!-- Button (Double) -->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="salvarHorario"></label>
				<div class="col-md-8">
				  <button id="salvarHorario" name="salvarHorario" class="btn btn-success">Salvar</button>
				  <button type="reset" data-dismiss="modal" id="cancelarHorario" name="cancelarHorario" class="btn btn-danger">Cancelar</button>
				</div>
			  </div>
			  </fieldset>
			  </form>


			</div>
			</br>
			</br>
		</div>
	  </div>
	  <div class="modal-footer">
	  </div>
	</div>

  </div>
</div>