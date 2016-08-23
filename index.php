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
    <link href="css/qualeasala.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row login">
                    <div class="col-lg-12 login-form">
                      <form class="form-horizontal" action="verifica_login.php" method="POST">
                        <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="login">Login</label>
                          <div class="col-md-4">
                          <input id="login" name="login" type="text" placeholder="Login" class="form-control input-md" required="">

                          </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="senha">Senha</label>
                          <div class="col-md-4">
                            <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md" required="">

                          </div>
                        </div>

                        <?php if($_GET && htmlspecialchars($_GET['msg'] == 1)) { ?>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="lembrar"></label>
							  <div class="col-md-4">
								<label class="checkbox-inline" for="lembrar-0">
									<font color = "red">Login e/ou senha inválido(s)</font>
								</label>
							  </div>
							</div>
						<?php } elseif($_GET && htmlspecialchars($_GET['msg'] == 2)) { ?>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="lembrar"></label>
							  <div class="col-md-4">
								<label class="checkbox-inline" for="lembrar-0">
									Você foi deslogado com sucesso!
								</label>
							  </div>
							</div>
						<?php } elseif($_GET && htmlspecialchars($_GET['msg'] == 3)) { ?>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="lembrar"></label>
							  <div class="col-md-4">
								<label class="checkbox-inline" for="lembrar-0">
									<font color = "red">Você não tem permissão para acessar esta página</font>
								</label>
							  </div>
							</div>
						<?php } ?>

                        <!-- Multiple Checkboxes (inline) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cadastrar"></label>
                          <div class="col-md-4">
							<label class="checkbox-inline" for="cadastrar-0">
                              <input type="radio" name="cadastrar" id="cadastrar-0" value="0" checked>
                              Logar
                            </label>
                            <label class="checkbox-inline" for="cadastrar-1">
                              <input type="radio" name="cadastrar" id="cadastrar-1" value="1">
                              Cadastrar
                            </label>
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-7 control-label" for="logar"></label>
                          <div class="col-md-5">
                            <button type="submit" id="logar" name="logar" class="btn btn-success">Entrar</button>
                          </div>
                        </div>

                        </fieldset>
                      </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
