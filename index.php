<?php
	if (isset($_POST["usuario"])){
		include("conexao.php");
		$usuario = mysqli_real_escape_string($conexao, $_POST["usuario"]);
		$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);
		$usuario = isset($usuario) ? trim($usuario) : false;
		$senha = isset($senha) ? md5(trim($senha)) : false;
		if(!$usuario || !$senha){
			echo "<script>alert('Digite o usuario e senha!')</script>";
			mysqli_close($conexao);
		} else {
			$sql = "SELECT id, nome, usuario, senha FROM gerente 
					WHERE usuario = '$usuario'";
			$result = mysqli_query($conexao, $sql);
			$total_results = mysqli_num_rows($result);
			if($total_results){
				$dados = mysqli_fetch_array($result);
				if(!strcmp($senha, $dados["senha"])) {
					session_start();
					$_SESSION["nome_gerente"] = $dados["nome"];
					$_SESSION["gerente_id"] = $dados["id"];
					mysqli_close($conexao);
					header("Location: inicial.php");
				} else {
					echo "<script>alert('Senha inválida!')</script>";
				}
			} else { 	
				echo "<script>alert('Login inexistente!')</script>";
			}
			mysqli_close($conexao);
		}
	}
?>
<html>
<head>
	<title>Jaya Bank International/welcome</title>
	<link rel="stylesheet" href="css_stuff/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	<style>
	body {
		  background-image: url('css_stuff/p_fundo.png');
		  width: 100%;
 		  height: 100%;
 		  padding: 100px 0;
		}
	#bg {
		  background-color: lightgrey;
		  width: 60%;
		  margin-left: 20%;	
		  border: 5px solid green;
		}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: lightgray;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: lightgray;
}

  		  	  

	</style>
</head>
</head>


<body>
	

	<div id="bg"> <h5 class="text-center display-5 mt-3 mb-3 ">$WELCOME TO JAYA BANK$<br>
	<h2 class="text-center display-10 mt-3 mb-3"><img src="css_stuff/aguia2.png" alt="águia" width="70 " height="50">  LOGIN:  <img src="css_stuff/aguia1.png" alt="águia" width="70 " height="50"></h2></h5></div>
	<form method="POST" action="index.php">

	<br><br>
		<div class="row form-group">
		
			<div class="d-flex justify-content-center">
				<input placeholder="User" type="text" name="usuario" class="form-control w-25 p-3 c-gray" id="usuario">
			</div>
			<div class="d-flex justify-content-center mt-3">
				<input placeholder="Password" type="password" name="senha" class="form-control w-25 p-3" id="senha">
			</div>
			<br><br>
			<div class="d-flex justify-content-center mt-3 mb-3">
				<button type="submit" class="btn btn-primary">Manager Login</button>
			</div>
			<br>
			<div style="display: " class="text-center">
				<a href="cad_gerente.php" class="btn btn-primary" >Register New Manager</a>
			</div>
		</div>
	</form>
</body>
</html>


