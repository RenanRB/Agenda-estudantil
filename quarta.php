<?php 
	$select = $conn->getAulas('quarta');
	while($row = $select->fetch(PDO::FETCH_OBJ)){ ?>
		<hr></hr>
		<p>
			Professor: <?php echo $row->ds_professor; ?></br>
			Matéria: <?php echo $row->ds_titulo; ?></br>
			Sala: <?php echo $row->ds_sala; ?></br>
			Horario: <?php echo $row->hr_inicial.' - '.$row->hr_final; ?></br>
			<a href="home.php?tipo=aula&aula=<?php echo $row->cd_aula; ?>">
				Editar
			</a>
			<a href="exclusoes.php?tipo=aula&aula=<?php echo $row->cd_aula; ?>">
				Excluir
			</a>
		</p>
	<?php }
?>