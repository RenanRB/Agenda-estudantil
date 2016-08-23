<?php 
	$select = $conn->getLembretesHojeMais();
	$count = 0;
	while($row = $select->fetch(PDO::FETCH_OBJ)){ ?>
		<div class="row"> 
			<div class="col-md-12 resumo-header-<?php echo !($count % 2) ? "par" : "impar"; ?>">
			   <h3><div class="row">
					<div class="col-md-11"><?php echo $row->ds_titulo; ?></div>
					<div class="col-md-1">
						<a href="home.php?tipo=lembrete&lembrete=<?php echo $row->cd_lembrete; ?>" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="exclusoes.php?tipo=lembrete&lembrete=<?php echo $row->cd_lembrete; ?>"class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</div>
				</div></h3>
			   <hr></hr>
			   <p>
				Data: <?php echo implode("/", array_reverse(explode("-", $row->dt_lembrete))); ?></br>
				<?php echo nl2br($row->ds_lembrete); ?>
			   </p>
			   <hr></hr>
			</div>
		</div>
	<?php $count++; 
	}
?>


