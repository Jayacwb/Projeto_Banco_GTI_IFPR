<?php 
	session_start();
	if(!isset($_SESSION["nome_gerente"])){
		header("Location: ../index.php");
	}
	require('../conexao.php');
	$query = "select c.num_conta as conta, c.agencia as agencia, m.deposito, m.transferencia, m.saque as saque, 
	                 c.nome as nome, c.cpf,  (m.deposito + m.transferencia - m.saque) as subtotal, m.data_movimentacao
			 		 from conta c
				join movimentacao m on m.conta_id = c.id";

	$conj_resultados = mysqli_query($conexao, $query);
	$extratos = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
	$json_extratos = json_encode($extratos);
	mysqli_close($conexao);
?>
<html>
<head>
	<title>Jaya Bank/Extract</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="../utils.js"></script>
	<style>
		#bg {
		  background-color: lightgrey;
		  width: 60%;
		  margin-left: 20%;	
		  border: 5px solid green;
		}
		body {
			background-color: whitesmoke;
			margin: 4px
		}
	</style>
</head>
<body>
	<?php require("../menu.php"); ?>
	<h5 id="bg" class="text-center display-5 mt-3 mb-3">Consulta de Contas</h5>
	<div class="container-xxl">
		<div class="col-md-3">
			<label for="nomeProcura" class="form-label">Procure a conta pelo nome do cliente:</label>
			<?php echo "<input name='nomeProcura' type='text' class='form-control' id='nomeProcura' onkeyup='buscarExtrato($json_extratos, this.value)'>" ?>
		</div> 
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Cpf</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Conta</th>
			  <th scope="col">Agência</th>
			  <th scope="col">Depósitos</th>
			  <th scope="col">Transferências</th>
			  <th scope="col">Saques</th>
			  <th scope="col">Data da Movimentação</th>
			  </tr>
		  </thead>
		  <tbody id='tab_extratos'>
			<?php 
				foreach($extratos as $movimentacao) {
					echo("<tr>");
					echo("<td>".$movimentacao['cpf']."</td>");
					echo("<td>".$movimentacao['nome']."</td>");
					echo("<td>".$movimentacao['conta']."</td>");
					echo("<td>".$movimentacao['agencia']."</td>");
					echo("<td>".$movimentacao['deposito']."</td>");
					echo("<td>".$movimentacao['transferencia']."</td>");
					echo("<td>".$movimentacao['saque']."</td>");
					echo("<td>".$movimentacao['data_movimentacao']."</td>");
					echo("</tr>");
				}
			?>
		  </tbody>
		 </table>
	 </div>
</body>
</html>