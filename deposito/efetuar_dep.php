<?php
	if ( isset($_POST['deposito'])  and isset($_POST['data_movimentacao']) 
	and isset($_POST['conta'])  ) {
		require('../conexao.php');

		$deposito = $_POST['deposito'];
		$data_movimentacao = $_POST['data_movimentacao'];
		$conta_id =  $_POST['conta'];



			   	$query = "INSERT INTO movimentacao (deposito, data_movimentacao, conta_id) 
                    	  VALUES ($deposito, NOW(), $conta_id)";

		$conj_resultados = mysqli_query($conexao, $query);

		if (!$conj_resultados) {
                echo "<script type='text/javascript'> 
                        document.getElementById('msg').setAttribute('class', 'text-center alert alert-danger');
                        document.getElementById('msg').innerHTML = 'Erro ao realizar o Depósito no Banco de Dados!';
                    </script>";
		
			} else {
				echo "<script type='text/javascript'>
					document.getElementById('msg').setAttribute('class','p-3 mb-2 bg-success text-white text-center');
					document.getElementById('msg').innerHTML = 'Depósito cadastrado com Sucesso!';
				 </script>";
			}	
		mysqli_close($conexao);
	}
?>     	

