<?php
	if (isset($_POST['cpf']) and isset($_POST['nome']) and isset($_POST['telefone']) 
		and isset($_POST['num_conta']) and isset($_POST['saldo']) and isset($_POST['agencia']) 
		and isset($_POST['data_conta']) ) {

		require('../conexao.php');
			$cpf = $_POST['cpf'];
			$nome = $_POST['nome'];
			$telefone = $_POST['telefone'];
			$num_conta = $_POST['num_conta'];
			$saldo = $_POST['saldo'];
			 $saldo = array(0, 20, 30, 40);
			$agencia = $_POST['agencia'];
			$data_conta = $_POST['data_conta'];
				$query = "START TRANSACTION; INSERT INTO conta (num_conta, saldo, agencia, data_conta, cpf, nome, telefone) 
							VALUES ('$num_conta','$saldo', '$agencia',  NOW(), '$cpf', '$nome', '$telefone')";
				$conj_resultados = mysqli_query($conexao, $query);				
						
			if (!$conj_resultados) {
				echo "<script type='text/javascript'>
					document.getElementById('msg').setAttribute('class','p-3 mb-2 bg-danger text-white text-center');
					document.getElementById('msg').innerHTML = 'Erro ao Cadastrar Cliente!';
					</script>";
			} else {
				echo "<script type='text/javascript'>
					document.getElementById('msg').setAttribute('class','p-3 mb-2 bg-success text-white text-center');
					document.getElementById('msg').innerHTML = 'Cliente Cadastrado com Sucesso!';
				 </script>";
			}
		
		mysqli_close($conexao);
	}
?>     	


 