<?php
	$sql = ("SELECT c.nome, m.deposito AS Saida, 
	SUM(m.deposito + m.transferencia) AS Entrada
		FROM movimentacao m JOIN conta c ON m.conta_id = c.id
		GROUP BY c.id
		UNION ALL
		SELECT c.nome, m.saque AS conta, 
		SUM(m.saque) AS saque 
		FROM movimentacao m JOIN conta c ON m.conta_id = c.id");				
	
   
?>