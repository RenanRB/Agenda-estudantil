<div id="lembretesModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h1>Cadastro de Lembretes</h1>
	  </div>
	  <div class="modal-body">
		<div class="col-lg-12">
		  </br></br>
			<div class="row">
			  <form class="form-horizontal" action="cadastrar_lembretes.php" method="POST">
			  <fieldset>
				<?php
					$rowEdit = 0;
					if ($_GET && htmlspecialchars($_GET['tipo'] == 'lembrete')) {
						$select = $conn->getLembrete($_GET['lembrete']);
						$rowEdit = $select->fetch(PDO::FETCH_OBJ);
						echo ' <input type="hidden" name="editar" value="'.$rowEdit->cd_lembrete.'">';
					}
				?>
			  <!-- Text input-->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="titulo">Titulo</label>
				<div class="col-md-4">
				<input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required="" value="<?php if (isset($rowEdit->ds_titulo)) { echo $rowEdit->ds_titulo; } ?>">

				</div>
			  </div>
			  
			  <!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="horaIni">Data</label>
				  <div class="col-md-4">
				  <input id="data" name="data" type="text" placeholder="" class="form-control input-md date" value="<?php if (isset($rowEdit->dt_lembrete)) { echo implode("/", array_reverse(explode("-", $rowEdit->dt_lembrete))); } ?>">
					
				  </div>
				</div>

			  <!-- Textarea -->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="lembrete">Lembrete</label>
				<div class="col-md-4">
				  <textarea class="form-control" id="lembrete" name="lembrete"><?php if (isset($rowEdit->ds_lembrete)) { echo $rowEdit->ds_lembrete; } ?></textarea>
				</div>
			  </div>
			  <!-- Button (Double) -->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="salvarLembrete"></label>
				<div class="col-md-8">
				  <button id="salvarLembrete" name="salvarLembrete" class="btn btn-success">Salvar</button>
				  <button type="reset" data-dismiss="modal" id="cancelarLembrete" name="cancelarLembrete" class="btn btn-danger">Cancelar</button>
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