<?php 
	session_start();
	if(!isset($_SESSION["nome_gerente"])){
		header("Location: ../index.php");
	}

?>

<html>
<head>
	<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET,POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
	?>
	<title>Banco PHP</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script src="../utils.js"></script>
	<style>
		#bg {
		  background-color: lightgrey;
		  width: 60%;
		  margin-left: 20%;	
		  border: 5px solid green;
		}
		.body {
			background-color: slategrey;
		}
	</style>



</head>

<body class="body">
	<?php require("../menu.php"); ?>
	<h5 id="bg" class="text-center display-5 mt-3 mb-3">Cadastro de Contas</h5>
	<div id='msg'></div>
	<?php require("efetuar_cad.php"); ?>

<div class="container-xxl">
	<form class="row g-3" method="POST" action="cad_conta_controller.php">
		<div class="col-md-3">
			<label for="inputCPF" class="form-label">CPF</label>
			<input name= "cpf" type="text" class="form-control" onchange="validarCPF(this.value)" id="inputCPF">
			<div id='div_cpf' class="invalid-feedback"><br> 
			</div>
		</div>
		<div> </div>
		<div class="col-md-4">
			<label for="inputNome" class="form-label">Nome Completo</label>
			<input name= "nome" type="nome" class="form-control" id="inputNome">
		</div>
		<div> </div>
		<div class="col-md-3">
			<label for="inputTelefone" class="form-label">Telefone (com DDD)</label>
			<input name= "telefone" type="telefone" class="form-control" id="inputTelefone">
		</div>
		<div> </div>
		<div class="col-md-3">
			<label for="num_conta" class="form-label">Número da conta</label>
			<input name= "num_conta" type="text" class="form-control" id="num_conta">
        </div>
		<div> </div>
		<div class="col-md-3">
			<label for="agencia">Agência</label>
			<input name="agencia" type="text" class="form-control" id="agencia">  
        </div>
		<div> </div>
		<div class="col-md-3">
        	<label for="data_conta">Data conta</label>
            <input type="text" name="data_conta" id="data_conta" class="form-control"> 
		</div>
		<div> </div>
		<br>
       <div class="col-12">
			<button type="submit" class="btn btn-primary" name="cad_conta">Salvar Registro</button>
		  </div>
		  
		  <script type="text/javascript">
		    $("#inputCPF").mask("000.000.000-00");
			$("#inputTelefone").mask("(00) 00000-0000");
		</script>
		</form>
	</div>
	
</body>
</html>