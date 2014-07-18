function nois(){
	document.writln("Hello World");
}

function test(){
	var msg = "Oi";
}

function horaparada(){
		var data = new Date();
		var hora = data.getHours();
		var min = data.getMinutes();
		var seg = data.getSeconds();
		var horaCompleta = hora + ":" + min + ":" + seg + ". ";
		//CampoData.value = dataCompleta;
		document.writeln(horaCompleta);
}

function apresentarNome(){
	var nome = 	document.getElementById('Nome').value;
	var sobrenome = document.getElementById('Sobrenome').value;
	if(nome == '' || sobrenome == '')
		alert('Nome inválido, Digite novamente.');
	else{
		var nomecompleto = 'Bem vindo ' + nome + ' ' + sobrenome + '!';
		alert(nomecompleto);
	}
}

function fazFatorial(numero){
	
	if(numero == 1)
		return 1;
	else{
		return numero * fazFatorial(numero-1);
	}
}

function exibeFatorial(){
	var numero = document.getElementById('calculadora').value;
	if(numero == '')
		alert('Número inválido, favor digitar novamente.');
	else{
		var valor = fazFatorial(numero);
		alert("O fatorial de " + numero + " é " + valor + '!');
		var expressao = 'A expressao utilizada foi: ';
		for(var i = numero; i != 0; i--){
			if(i == numero)
				expressao = expressao + ' ' + i;
			else
				expressao = expressao + ' * ' + i + ' '
		}
		expressao = expressao + '!';
		alert(expressao)
	}
}