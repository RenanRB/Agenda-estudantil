<div id="pessoasModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h1>Cadastro de Pessoa</h1>
	  </div>
	  <div class="modal-body">
		<div class="col-lg-12">
		  </br></br>
			<div class="row">
			  <form class="form-horizontal" action="cadastrar_pessoas.php" method="POST">
			  <fieldset>
			  <!-- Text input-->
			  <div class="form-group">
				<label class="col-md-4 control-label" for="nome">Nome</label>
				<div class="col-md-4">
				<input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">

				</div>
			  </div>
			  
			  <!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="horaIni">Data de nascimento</label>
				  <div class="col-md-4">
				  <input id="data" name="data" type="text" placeholder="" class="form-control input-md date" >
					
				  </div>
				</div>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="email">E-mail</label>
				  <div class="col-md-4">
				  <input id="email" name="email" type="text" placeholder="" class="form-control input-md " >
					
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="horaIni">Telefone</label>
				  <div class="col-md-4">
					<input id="telefone" name="telefone[]" type="text" placeholder="" class="form-control input-md phone" >
				  </div>
				</div>
				  <div class="wrapper">
					<button type="button" class="adicionar btn btn-danger">Adicionar telefone</button>
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