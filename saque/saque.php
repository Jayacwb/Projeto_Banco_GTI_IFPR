<?php 
	session_start();
	if(!isset($_SESSION["nome_gerente"])){
		header("Location: ../index.php");
	}
	
?>

<html>
<head>
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
		body {
			background-color: slategrey;
			margin: 4px
		}
	</style>
</head>

<body>
	<?php require("../menu.php"); ?>
	<h5 id="bg" class="text-center display-5 mt-3 mb-3">Saque</h5>
	<div id='msg'></div>	
	<?php require("efetuar_sac.php"); ?>

<div class="container-xxl">
	<form class="row g-3" method="POST" action="saque.php">
		<div class="col-md-4">
			<label for="saque" class="form-label">Saque</label>
			<input name= "saque" type="text" class="form-control" id="saque">
		  </div>
		  <script type="text/javascript">
			$('#saque').mask('#.##0,00', {reverse: true});
		  </script>
		  <div></div>
		<div class="col-md-4">
        	<label for="data_movimentacao">Data Movimentacao</label>
            <input type="date" name="data_movimentacao" id="data_movimentacao" class="form-control"> 
		</div>
		<div></div>
		<div class="col-md-4">
			<h5><span class="label label-default">Conta</span></h5>
				<select name="conta" class="col-md-5 form-control" id="conta">
					<option value="" selected> Selecione uma conta </option>
					<?php 
						require('../conexao.php');
						$query = "SELECT * FROM  conta";
						$conj_resultados = mysqli_query($conexao, $query);
						$contas = array();
						
						if ($conj_resultados) {
							$contas = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
							
						}
						foreach ($contas as $conta) {
							$c_id = $conta['id'];
							$c_num_conta = $conta['num_conta'];
							$c_agencia = $conta['agencia'];
							$c_nome = $conta['nome'];
							echo "<option value='$c_id'>$c_num_conta - $c_agencia - $c_nome</option>";
					
						 }
					mysqli_close($conexao);
					
					?>
	
				</select>
			</div>           
            <div></div><br>
            <div class="col-md-5 text-left">
				<button type="submit" class="btn btn-primary">Enviar</button>
			
			</div>
        </form>
    </div>     
 </body>
</html>