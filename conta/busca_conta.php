<?php
	session_start();
	if(!isset($_SESSION["nome_gerente"])){
		header("Location: ../index.php");
	}
	require('../conexao.php');
	$query = "SELECT * FROM conta;";
	$conj_resultados = mysqli_query($conexao, $query);
	$contas = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
	$json_contas = json_encode($contas);
	mysqli_close($conexao);
?>
<html>
<head>
	<title>Busca de Clientes</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="../utils.js"></script>
</head>
<body>
	<?php require("../menu.php"); ?>
	<h5 class="text-center display-5 mt-3 mb-3">Busca de Clientes</h5>
	<div class="container-xxl">
		<div class="col-md-3">
			<label for="nomeProcura" class="form-label">Procure o cliente pelo nome:</label>
			<?php echo "<input name='nomeProcura' type='text' class='form-control' id='nomeProcura' onkeyup='buscarConta($json_contas, this.value)'>" ?>
		</div> 
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">CPF</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Telefone</th>
			  <th scope="col">Nº Conta</th>
			  <th scope="col">Agência</th>
			  <th scope="col">Data da Abertura</th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  <tbody id='tab_contas'>
			<?php 
				foreach($contas as $conta) {
					$conta_id = $conta['id'];
					echo("<tr>");
					echo("<td>".$conta['cpf']."</td>");
					echo("<td>".$conta['nome']."</td>");
					echo("<td>".$conta['telefone']."</td>");
					echo("<td>".$conta['num_conta']."</td>");
					echo("<td>".$conta['agencia']."</td>");
					echo("<td>".$conta['data_conta']."</td>");
					echo("</tr>");
				}
			?>
		  </tbody>
		 </table>
	 </div>
</body>
</html>