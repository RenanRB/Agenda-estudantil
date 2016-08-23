<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_POST){
		$select = $conn->cadastrar_pessoa_completo($_POST['nome'], $_POST['data'], $_POST['email'], $_POST['telefone']);
		
		echo ("
		<script>
			window.location.href = \"home.php\";
		</script>
		");
	}
	
?>