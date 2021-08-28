<?php 
	if (isset($_POST['usuario']) and isset($_POST['senha'])) {
		$usuario = $_POST['usuario'];
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		include("conexao.php");
		$senha = md5(trim($senha));
		$query = "INSERT INTO gerente (usuario, nome, senha) VALUES ('$usuario', '$nome', '$senha')";
		$conj_resultados = mysqli_query($conexao, $query);
		if (!$conj_resultados) {
			echo("<b>Erro na inserção!</b><br>".mysqli_error($conexao)."<br>");
		}
		mysqli_close($conexao);
		header("Location: index.php");
	}
?>

<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<h5 class="text-center display-5 mt-3 mb-3">Banco PHP<br> Cadastro Gerente</h5>
	<form method="POST" action="cad_gerente.php">
		<div class="row form-group">
			<div class="d-flex justify-content-center">
				<input placeholder="Nome do Usuario" type="text" name="usuario" class="form-control w-25 p-3" id="usuario">
			</div>
			<div class="d-flex justify-content-center mt-3">
				<input placeholder="Nome do Gerente" type="text" name="nome" class="form-control w-25 p-3" id="nome">
			</div>
			<div class="d-flex justify-content-center mt-3">
				<input placeholder="Senha" type="password" name="senha" class="form-control w-25 p-3" id="senha">
			</div>
			<div class="d-flex justify-content-center mt-3 mb-3">
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</div>
		</div>
	</form>
</body>
</html>