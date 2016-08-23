<div id="materiasModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h1>Cadastro de Matérias</h1>
	  </div>
	  <div class="modal-body">
		<div class="col-lg-12">
		  </br></br>
			<div class="row"> 
			  <form class="form-horizontal" action="cadastrar_materias.php" method="POST">
			  <fieldset>

			  <!-- Text input-->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="materia">Materia</label>
				<div class="col-md-4">
				<input id="materia" name="materia" type="text" placeholder="Nome da materia" class="form-control input-md" required="">

				</div>
			  </div>

			  <!-- Text input-->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="professor">Professor</label>
				<div class="col-md-4">
				<input id="professor" name="professor" type="text" placeholder="Nome do Professor" class="form-control input-md">

				</div>
			  </div>

			  <!-- Text input-->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="semestre">Semestre</label>
				<div class="col-md-4">
				<input id="semestre" name="semestre" type="text" placeholder="Semestre. Ex: 2016-2" class="form-control input-md" required="">

				</div>
			  </div>

			  <!-- Button (Double) -->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="salvarMateria"></label>
				<div class="col-md-8">
				  <button id="salvarMateria" name="salvarMateria" class="btn btn-success">Salvar</button>
				  <button type="reset" data-dismiss="modal" id="cancelarMateria" name="cancelarMateria" class="btn btn-danger">Cancelar</button>
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