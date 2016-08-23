<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		if (!isset($_POST['editar'])) {
			$select = $conn->cadastrar_lembrete($_POST['titulo'], $_POST['data'], $_POST['lembrete']);
		} else {
			$select = $conn->editar_lembrete($_POST['titulo'], $_POST['data'], $_POST['lembrete'], $_POST['editar']);
		}
		echo ("
		<script>
			window.location.href = \"home.php\";
		</script>
		");
	}
	
?>