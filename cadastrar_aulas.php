<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		if (!isset($_POST['editar'])) {
			$select = $conn->cadastrar_aula($_POST['dia_semana'], $_POST['horario'], $_POST['materia'], $_POST['sala']);
		} else {
			$select = $conn->editar_aula($_POST['dia_semana'], $_POST['horario'], $_POST['materia'], $_POST['sala'], $_POST['editar']);
		}
		echo ("
		<script>
			window.location.href = \"home.php\";
		</script>
		");
	}
	
?>