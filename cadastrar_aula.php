<div id="aulasModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h1>Cadastro de Aulas</h1>
	  </div>
	  <div class="modal-body">
		<div class="col-lg-12">
		  </br></br>
			<div class="row">
			  <form class="form-horizontal" action="cadastrar_aulas.php" method="POST">
				<fieldset>
				<?php
					$rowEdit = 0;
					if ($_GET && htmlspecialchars($_GET['tipo'] == 'aula')) {
						$select = $conn->getAula($_GET['aula']);
						$rowEdit = $select->fetch(PDO::FETCH_OBJ);
						echo ' <input type="hidden" name="editar" value="'.$rowEdit->cd_aula.'">';
					}
				?>
				<!-- Multiple Radios -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="dia_semana">Dia da Semana</label>
				  <div class="col-md-4">
				  <div class="radio">
					<label for="dia_semana-0">
					  <input type="radio" name="dia_semana" id="dia_semana-0" value="segunda" checked="checked">
					  Segunda
					</label>
				  </div>
				  <div class="radio">
					<label for="dia_semana-1">
					  <input type="radio" name="dia_semana" id="dia_semana-1" value="terca" <?php if (isset($rowEdit->en_dia) && $rowEdit->en_dia == 'terca') {echo 'checked="checked"';} ?>>
					  Terça
					</label>
				  </div>
				  <div class="radio">
					<label for="dia_semana-2">
					  <input type="radio" name="dia_semana" id="dia_semana-2" value="quarta" <?php if (isset($rowEdit->en_dia) && $rowEdit->en_dia == 'quarta') {echo 'checked="checked"';} ?>>
					  Quarta
					</label>
				  </div>
				  <div class="radio">
					<label for="dia_semana-3">
					  <input type="radio" name="dia_semana" id="dia_semana-3" value="quinta" <?php if (isset($rowEdit->en_dia) && $rowEdit->en_dia == 'quinta') {echo 'checked="checked"';} ?>>
					  Quinta
					</label>
				  </div>
				  <div class="radio">
					<label for="dia_semana-4">
					  <input type="radio" name="dia_semana" id="dia_semana-4" value="sexta" <?php if (isset($rowEdit->en_dia) && $rowEdit->en_dia == 'sexta') {echo 'checked="checked"';} ?>>
					  Sexta
					</label>
				  </div>
				  <div class="radio">
					<label for="dia_semana-5">
					  <input type="radio" name="dia_semana" id="dia_semana-5" value="sabado" <?php if (isset($rowEdit->en_dia) && $rowEdit->en_dia == 'sabado') {echo 'checked="checked"';} ?>>
					  Sabado
					</label>
				  </div>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="horario">Horario</label>
				  <div class="col-md-4">
					<select id="horario" name="horario" class="form-control">
					<?php 
						$select = $conn->getHorarios();
						while($row = $select->fetch(PDO::FETCH_OBJ)){
							if ($rowEdit->cd_horario == $row->cd_horario) {
								echo '<option selected value="'.$row->cd_horario.'">'.$row->hr_inicial.' - '.$row->hr_final.'</option>';
							} else {
								echo '<option value="'.$row->cd_horario.'">'.$row->hr_inicial.' - '.$row->hr_final.'</option>';
							}
						}
					?>
					</select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="materia">Materia</label>
				  <div class="col-md-4">
					<select id="materia" name="materia" class="form-control">
					<?php 
						$select = $conn->getMaterias();
						while($row = $select->fetch(PDO::FETCH_OBJ)){
							if ($rowEdit->cd_materia == $row->cd_materia) {
								echo '<option selected value="'.$row->cd_materia.'">'.$row->ds_titulo.'</option>';
							} else {
								echo '<option value="'.$row->cd_materia.'">'.$row->ds_titulo.'</option>';
							}
						}
					?>
					</select>
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="sala">Sala</label>
				  <div class="col-md-4">
				  <input id="sala" name="sala" type="text" placeholder="Sala" class="form-control input-md" value="<?php if (isset($rowEdit->ds_sala)) { echo $rowEdit->ds_sala; } ?>">
				  </div>
				</div>

				<!-- Button (Double) -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="salvarAula"></label>
				  <div class="col-md-8">
					<button id="salvarAula" name="salvarAula" class="btn btn-success">Salvar</button>
					<button type="reset" data-dismiss="modal" id="cancelarAula" name="cancelarAula" class="btn btn-danger">Cancelar</button>
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