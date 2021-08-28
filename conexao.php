	<?php
		$conexao = mysqli_connect("localhost:3306", "root", "");
		if (!$conexao) {
			die("Impossível conectar: " . mysqli_connect_error($conexao));
		}
		mysqli_set_charset($conexao, "utf8");
		$banco_ativo = mysqli_select_db($conexao, "sis_banco_bd");
	?>