
function editDistance(s1, s2) {
	s1 = s1.toLowerCase();
	s2 = s2.toLowerCase();
	var costs = new Array();
	for (var i = 0; i <= s1.length; i++) {
		var lastValue = i;
		for (var j = 0; j <= s2.length; j++) {
			if (i == 0) {
				costs[j] = j;
			} else {
				if (j > 0) {
					var newValue = costs[j - 1];
					if (s1.charAt(i - 1) != s2.charAt(j - 1)) {
						newValue = Math.min(Math.min(newValue, lastValue),costs[j]) + 1;
					}
					costs[j - 1] = lastValue;
					lastValue = newValue;
				}
			}
		}
		if (i > 0) {
			costs[s2.length] = lastValue;
		}
	}
	return costs[s2.length];
}

function similarity(s1, s2) {
	var longer = s1;
	var shorter = s2;
	if (s1.length < s2.length) {
		longer = s2;
		shorter = s1;
	}
	var longerLength = longer.length;
	if (longerLength == 0) {
		return 1.0;
	}
	return (longerLength - editDistance(longer, shorter)) / parseFloat(longerLength);
}

function buscarExtrato(extratos, chave_busca){
	var extratosFiltrados;
	if (chave_busca != "") {
		extratosFiltrados = extratos.filter(
			function (movimentacao) {
				return similarity(movimentacao.nome, chave_busca) >= 0.3;
			}
		);
	} else {
		extratosFiltrados = extratos;
	}
	var conteudo = "";
	for(let i = 0; i < extratosFiltrados.length; i = i + 1 ) {
		let movimentacao = extratosFiltrados[i];
		console.log(movimentacao);
		conteudo += '<tr>';
		conteudo += '<td> ' + movimentacao.cpf + '</td>';
		conteudo += '<td> ' + movimentacao.nome + '</td>';
		conteudo += '<td> ' + movimentacao.conta + '</td>';
		conteudo += '<td> ' + movimentacao.agencia + '</td>';
		conteudo += '<td> ' + movimentacao.deposito + '</td>';
		conteudo += '<td> ' + movimentacao.transferencia + '</td>';
		conteudo += '<td> ' + movimentacao.saque + '</td>';
		conteudo += '<td> ' + movimentacao.data_movimentacao + '</td>';
		conteudo += '</tr>';
	}
	document.getElementById("tab_extratos").innerHTML = conteudo;
}

function buscarConta(contas, chave_busca){
	var contasFiltrados;
	if (chave_busca != "") {
		contasFiltrados = contas.filter(
			function (conta) {
				return similarity(conta.nome, chave_busca) >= 0.3;
			}
		);
	} else {
		contasFiltrados = contas;
	}
	var conteudo = "";
	for(let i = 0; i < contasFiltrados.length; i = i + 1 ) {
		let conta = contasFiltrados[i];
		conteudo += '<tr>';
		conteudo += '<td> ' + conta.cpf + '</td>';
		conteudo += '<td> ' + conta.nome + '</td>';
		conteudo += '<td> ' + conta.telefone + '</td>';
		conteudo += '<td> ' + conta.num_conta + '</td>';
		conteudo += '<td> ' + conta.agencia + '</td>';
		conteudo += '<td> ' + conta.data_conta + '</td>';
		conteudo += '</tr>';
	}
	document.getElementById("tab_contas").innerHTML = conteudo;
}


function validarCPF(cpf) {
	cpf = cpf.replaceAll(".","");
	cpf = cpf.replace("-","");
	if (cpf == "") {
		document.getElementById("inputCPF").setAttribute("class", "form-control");
		document.getElementById("div_cpf").innerHTML = "";
		return;
	}
	var soma;
	var resto;
	soma = 0;
	if (cpf == "00000000000") {
		document.getElementById("inputCPF").setAttribute("class", "form-control is-invalid");
		document.getElementById("div_cpf").innerHTML = "CPF inválido!";
		return;
	}
	for (i=1; i<=9; i++) 
		soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
	resto = (soma * 10) % 11;
	if ((resto == 10) || (resto == 11)) 
		resto = 0;
	if (resto != parseInt(cpf.substring(9, 10))) {
		document.getElementById("inputCPF").setAttribute("class", "form-control is-invalid");
		document.getElementById("div_cpf").innerHTML = "CPF inválido!";
		return;
	}
	soma = 0;
	for (i = 1; i <= 10; i++) 
		soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
	resto = (soma * 10) % 11;
	if ((resto == 10) || (resto == 11)) 
		resto = 0;
	if (resto != parseInt(cpf.substring(10, 11))) {
		document.getElementById("inputCPF").setAttribute("class", "form-control is-invalid");
		document.getElementById("div_cpf").innerHTML = "CPF inválido!";
		return;
	}
	document.getElementById("inputCPF").setAttribute("class", "form-control is-valid");
	document.getElementById("div_cpf").innerHTML = "";
	return;
}