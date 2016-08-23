<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		if (htmlspecialchars($_POST['cadastrar']) == 0) {
			$select = $conn->login(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['senha']));
			
			if ($select->rowCount() == 1) {
				session_start();
				$row = $select->fetch(PDO::FETCH_OBJ);
				$_SESSION["nome"] = $row->ds_nome;
				$_SESSION["login"] = $row->ds_login;
				$_SESSION["cd_usuario"] = $row->cd_usuario;
				echo ("
				<script>
					window.location.href = \"home.php\";
				</script>
				");
			} else {
				echo ("
				<script>
					window.location.href = \"index.php?msg=1\";
				</script>
				");
			}
		} else {
			$select = $conn->cadastrarPessoa(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['senha']));
			
			$select = $conn->login(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['senha']));
			
			if ($select->rowCount() == 1) {
				session_start();
				$row = $select->fetch(PDO::FETCH_OBJ);
				$_SESSION["nome"] = $row->ds_nome;
				$_SESSION["cd_usuario"] = $row->cd_usuario;
				echo ("
				<script>
					window.location.href = \"home.php?tipo=cadastro\";
				</script>
				");
			} else {
				echo ("
				<script>
					window.location.href = \"index.php?msg=1\";
				</script>
				");
			}
		}
	}
?>