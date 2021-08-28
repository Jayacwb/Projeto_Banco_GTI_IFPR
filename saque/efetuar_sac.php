<?php
	if ( isset($_POST['saque'])  and isset($_POST['data_movimentacao']) and isset($_POST['conta']) ) {
		require('../conexao.php');
			$saque = str_replace(',', '.', $_POST['saque']);
			$data_movimentacao = $_POST['data_movimentacao'];			
			$conta_id =  $_POST['conta'];
			   	$query = "INSERT INTO movimentacao (saque, data_movimentacao, conta_id) 
                    	  VALUES ('$saque', NOW(), '$conta_id')";
		    $conj_resultados = mysqli_query($conexao, $query);
            if (!$conj_resultados) {
                echo "<script type='text/javascript'> 
                        document.getElementById('msg').setAttribute('class', 'text-center alert alert-danger');
                        document.getElementById('msg').innerHTML = 'Erro ao realizar o Saque no Banco de Dados!';
                    </script>";
		
			} else {
				echo "<script type='text/javascript'>
					document.getElementById('msg').setAttribute('class','p-3 mb-2 bg-success text-white text-center');
					document.getElementById('msg').innerHTML = 'Saque cadastrado com Sucesso!';
				 </script>";
			}	
		mysqli_close($conexao);
	}
?>     	

