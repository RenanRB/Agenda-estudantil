<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		$select = $conn->cadastrar_materia($_POST['materia'], $_POST['professor'], $_POST['semestre']);
		echo ("
		<script>
			window.location.href = \"home.php\";
		</script>
		");
	}
	
?>