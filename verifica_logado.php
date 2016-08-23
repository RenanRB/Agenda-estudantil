<?php 
	session_start();
	if (!isset($_SESSION['cd_usuario'])) {
		echo ("
		<script>
			window.location.href = \"index.php?msg=3\";
		</script>
		");
	}
?>