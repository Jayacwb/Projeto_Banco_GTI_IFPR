<?php
if (isset($_POST['cad_conta'])) {
    try {
        echo "FODEEEEO1";
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $num_conta = $_POST['num_conta'];
        $agencia = $_POST['agencia'];
        $data_conta = $_POST['data_conta'];

        require('../conexao.php');

        $deposito = $_POST['deposito'];
        $data_movimentacao = $_POST['data_movimentacao'];
        $conta_id = $_POST['conta'];
        $query = "INSERT INTO conta (num_conta, agencia, cpf, nome, data_conta, telefone, saldo) 
                    	  VALUES ('$num_conta', '$agencia','$cpf', '$nome', '$data_conta', '$telefone', 0)";
        $conj_resultados = mysqli_query($conexao, $query);

        header('Location: ../inicial.php');
    } catch (Exception $e) {
        var_dump($e);
    }
}else{

}

?>