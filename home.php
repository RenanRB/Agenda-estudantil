<?php
	require_once("verifica_logado.php");
	require_once("conexao.php");

	$conn = new Conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Que sala é ?</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/qualeasala.css" rel="stylesheet">
<!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="cursor:pointer;">
                <li class="sidebar-brand">
                    <a href="home.php">
                        Resumo da Semana
                    </a>
                </li>
                <li>
                    <a href="home.php?tipo=aulaNovo">Cadastrar Aula</a>
					<span data-toggle="modal" data-target="#aulasModal" id="cadastrarAulaModal"></span>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#materiasModal" id="cadastrarMateriaModal">Cadastrar Matéria</a>
                </li>
				<li>
                    <a data-toggle="modal" data-target="#horariosModal" id="cadastrarHorarioModal">Cadastrar Horário</a>
                </li>
				<li>
        	<a href="grafico.php">Grafico de Alunos por Aula</a>
        </li>
				<li>
					<a href="logout.php">Sair</a>
				</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- CADASTRAR AULAS -->
        <?php include_once("cadastrar_aula.php"); ?>
        <!-- /CADASTRAR AULAS -->

        <!-- CADASTRAR MATÉRIAS -->
        <?php include_once("cadastrar_materia.php"); ?>
        <!-- /CADASTRAR MATÉRIAS -->

		<!-- CADASTRAR HORÁRIOS -->
        <?php include_once("cadastrar_horario.php"); ?>
        <!-- /CADASTRAR HORÁRIOS -->

        <!-- CADASTRAR LEMBRETE -->
        <?php include_once("cadastrar_lembrete.php"); ?>
        <!-- /CADASTRAR LEMBRETES -->

		<!-- CADASTRAR PESSOA -->
        <?php include_once("cadastrar_pessoa.php"); ?>
        <!-- /CADASTRAR PESSOA -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <button id="menu-toggle" type="button" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                      </button>
                    </div>
                    <div class="col-lg-12">
                        <h1>Resumo da Semana</h1>
                      </br></br>
                        <div class="row"> <!-- 10 + 2 = 12 -->
                            <div class="col-md-2 resumo-header-par">
                               <h3> Segunda  </h3>
							   <?php include_once("segunda.php"); ?>
							   <hr></hr>
                            </div>
                            <div class="col-md-2 resumo-header-impar">
								<h3> Terça  </h3>
								<?php include_once("terca.php"); ?>
								<hr></hr>
							</div>
                            <div class="col-md-2 resumo-header-par">
								<h3> Quarta  </h3>
								<?php include_once("quarta.php"); ?>
								<hr></hr>
							</div>
                            <div class="col-md-2 resumo-header-impar">
								<h3> Quinta  </h3>
								<?php include_once("quinta.php"); ?>
								<hr></hr>
							</div>
                            <div class="col-md-2 resumo-header-par">
								<h3> Sexta  </h3>
								<?php include_once("sexta.php"); ?>
								<hr></hr>
							</div>
                            <div class="col-md-2 resumo-header-impar">
								<h3> Sabado  </h3>
								<?php include_once("sabado.php"); ?>
								<hr></hr>
							</div>
                        </div>
						</br>
						</br>
                    </div>
					<div class="col-lg-12">
                        <h1>Lembretes</h1>
						<?php include_once("lembretes.php"); ?>
						</br>
						</br>
						<div class="row">
							<div class="col-md-10"> </div>
							<div class="col-md-2">
								<a href="home.php?tipo=lembreteNovo" type="button" class="btn btn-default" aria-label="Right Align" >
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									<span>Adicionar Lembretes</span>
								</a>
								<span data-toggle="modal" data-target="#lembretesModal"  id="cadastrarLembreteModal"></span>
							</div>
					  </div>
					</div>
        </div>
      </div>
    </div>
	<span data-toggle="modal" data-target="#pessoasModal"  id="cadastrarPessoaModal"></span>
 <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

    <!-- Menu Toggle Script -->

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

	jQuery(function($){
	   $(".date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	   $(".hour").mask("99:99");
	   $(".phone").mask("(99) 9999-9999?9")
        .focusout(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });
	});

	var telPlaceholder = 2,
    telClass = 0;

$('.adicionar').on('click', function() {
	$('.wrapper:last').before('<div class="form-group"><label class="col-md-4 control-label" for="horaIni">Telefone '+ telPlaceholder++ +'</label><div class="col-md-4"><input id="telefone" name="telefone[]" type="text" placeholder="" class="form-control input-md phone" SIZE="27" MAXLENGTH="27"></div></div>');
});
    </script>

	<?php if ($_GET && (htmlspecialchars($_GET['tipo'] == 'aula' || htmlspecialchars($_GET['tipo'] == 'aulaNovo')))) { ?>
		<script> document.getElementById('cadastrarAulaModal').click(); </script>
	<?php } elseif ($_GET && (htmlspecialchars($_GET['tipo'] == 'lembrete') || htmlspecialchars($_GET['tipo'] == 'lembreteNovo'))) { ?>
		<script> document.getElementById('cadastrarLembreteModal').click(); </script>
	<?php } elseif ($_GET && (htmlspecialchars($_GET['tipo'] == 'cadastro'))) { ?>
		<script> document.getElementById('cadastrarPessoaModal').click(); </script>
	<?php } ?>

</body>

</html>
