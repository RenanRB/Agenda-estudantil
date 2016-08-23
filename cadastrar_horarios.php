<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		$select = $conn->cadastrar_horario($_POST['hr_inicial'], $_POST['hr_final']);
		echo ("
		<script>
			window.location.href = \"home.php\";
		</script>
		");
	}
	
?>