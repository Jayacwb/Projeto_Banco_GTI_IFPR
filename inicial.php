<?php 
	session_start();
	if(!isset($_SESSION["nome_gerente"])){
		header("Location: index.php");
	}
?>
<html>
<head>
	<title>Jaya Bank International/MENU</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style>
	body {
		  background-image: url('css_stuff/p_fundo.png');
		}
		#bg {
		  background-color: lightgrey;
		  width: 60%;
		  margin-left: 20%;	
		  border: 5px solid green;
		}
		#bg3 {
			background-image: url('css_stuff/p_fundo2.jpg');
			

		}
	
	</style>
</head>

<body>

	<?php require("menu.php"); ?>
	<h2 id="bg" class="text-center display-2 mt-3 mb-3">$ JAYA BANK $</h2>
	<h5 id="bg" class="text-center display-5 mt-3 mb-3">Bem vindo sr(a). 
		<?php echo $_SESSION['nome_gerente']; ?>!
	</h5>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
	<div  class="container-fluid">
		<div  id="bg3" class="jumbotron">
			<div class="row vertical-align">
			  <div class="col-xs-3">
				<a href="/sis_banco_atualizado/conta/cad_conta.php"><img src="/sis_banco_atualizado/img/cad_conta.jpg" class="img-responsive mb-5"></a>
				<a href="/sis_banco_atualizado/conta/busca_conta.php"><img src="/sis_banco_atualizado/img/consulta_conta.jpg" class="img-responsive mb-5"></a></a>
			</div>

			<div class="col-xs-3">
				<a href="/sis_banco_atualizado/deposito/depositar.php"><img src="/sis_banco_atualizado/img/deposito.jpg" class="img-responsive mb-5"></a>
				<a href="/sis_banco_atualizado/saque/saque.php"><img src="/sis_banco_atualizado/img/saque.jpg" class="img-responsive mb-5"></a>			
			  </div>
			<div class="col-xs-3">
				<a href="/sis_banco_atualizado/transferencia/transferencia.php"><img src="/sis_banco_atualizado/img/transferencia.jpg" class="img-responsive mb-5"></a>
				<a href="/sis_banco_atualizado/saldo/saldo.php"><img src="/sis_banco_atualizado/img/saldo.jpg" class="img-responsive mb-5"></a>			
			</div>
			<div class="col-xs-3">
				<a href="/sis_banco_atualizado/extrato/extrato.php"><img src="/sis_banco_atualizado/img/extrato.jpg" class="img-responsive mb-5"></a>
				
			</div>
							
			  </div>

			</div>
		</div>
	</div>
</body>
</html>