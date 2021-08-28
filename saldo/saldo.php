<?php
session_start();
if (!isset($_SESSION["nome_gerente"])) {
    header("Location: ../index.php");
}
require '../conexao.php';
$query = "SELECT * FROM conta;";
$conj_resultados = mysqli_query($conexao, $query);
$contas = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
$json_contas = json_encode($contas);
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
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
			background-color: whitesmoke;
			margin: 4px
		}
	</style>
</head>

<body>
<?php require("../menu.php"); ?>
<h5 id="bg" class="text-center display-5 mt-3 mb-3">SALDO CONTA</h5>
<div id='msg'></div>
<?php require("mostrar_saldo.php"); ?>

<div class="container-xxl">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nº da conta</th>
            <th scope="col">Agência</th>
            <th scope="col">Data Abertura</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereco</th>
            <th scope="col">Telefone</th>
            <th scope="col">Saldo</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody id='tab_contas'>
        <?php
        foreach ($contas as $conta) {
            $conta_id = $conta['id'];
            $query = "SELECT * FROM movimentacao WHERE conta_id = $conta_id;";
            $conj_resultado = mysqli_query($conexao, $query);
            $saldo = mysqli_fetch_all($conj_resultado, MYSQLI_ASSOC);
            echo("<tr>");
            echo("<td>" . $conta['num_conta'] . "</td>");
            echo("<td>" . $conta['agencia'] . "</td>");
            echo("<td>" . $conta['data_conta'] . "</td>");
            echo("<td>" . $conta['nome'] . "</td>");
            echo("<td>" . $conta['cpf'] . "</td>");
            echo("<td>" . $conta['telefone'] . "</td>");
            $saldo_final = $conta['saldo'];
            foreach ($saldo as $s){
                $saldo_final += $s['deposito'] - $s['saque'] + $s['transferencia'];
            }
            echo("<td>R$" . number_format($saldo_final, '2', ',', '.') . "</td>");

            echo("</tr>");
        }
        mysqli_close($conexao);
        ?>
        </tbody>
    </table>
</div>
</body>
</html>