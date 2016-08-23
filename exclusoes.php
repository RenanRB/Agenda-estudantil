<?php 
	require_once("conexao.php");
	
	$conn = new Conexao();
	
	if($_GET){
		if (htmlspecialchars($_GET['tipo']) == 'lembrete') {
			$select = $conn->excluir_lembrete(htmlspecialchars($_GET['lembrete']));
		} elseif (htmlspecialchars($_GET['tipo']) == 'aula') {
			$select = $conn->excluir_aula(htmlspecialchars($_GET['aula']));
		}
	}
	echo ("
	<script>
		window.location.href = \"home.php\";
	</script>
	");
?>