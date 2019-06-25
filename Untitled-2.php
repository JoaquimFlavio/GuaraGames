<!-- Nomear arquivo como sorteio.php -->
<!DOCTYPE html>
<html>
	<head>
		<title>Sorteio</title>
		<script>
			//Função para permitir apenas números nos campos de entrada
			function somenteNumero(e){
				var tecla=(window.event)?event.keyCode:e.which;   
				if((tecla>47 && tecla<58)) return true;
				else{
					if (tecla==8 || tecla==0) return true;
				else  return false;
				}
			}
		
			var vetor = new Array();
			
			//Função para sortear aleatoriamente números dentro do intervalo determinado
			function sortear(de, ate, limite){
				var qtde = limite;
				//Se o vetor ainda não atingiu o limite determinado
				if (qtde > vetor.length){
					do {
						var aux = 0;
						//Sorteia um número dentro do intervalo
						var numero = Math.floor((Math.random() * (ate-de+1))+de);
						//Verifica se número já foi sorteado
						for (i=0;i<vetor.length;i++){
							if (vetor[i] == numero){
								aux++;
							}
						}
					//Se número já foi sorteado, repete o sorteio
					} while (aux > 0);
					//Imprime número sorteado na tela
					var campo=document.getElementById("numero")
						campo.innerHTML=numero;
					//Adiciona número sorteado ao fim do vetor
					vetor.push(numero);
					var aux2 = 0;
					var vetorado;
					//Copia vetor tratando exibição
					for (i=0;i<vetor.length;i++){
						if (aux2 == 0){
							vetorado = vetor[i];
						} else {
							if (aux2 % 10 == 0){
								vetorado = vetorado+"<br />"+vetor[i];
							} else {
								vetorado = vetorado+" - "+vetor[i];
							}
						}
						aux2++;
					}
					//Exibe vetor com números já sorteados após tratar exibição
					var campo2=document.getElementById("vetor");
						campo2.innerHTML=vetorado;
				//Se o vetor atingiu o limite, exibe mensagem e oculta botão
				} else {
					alert ("Acabou");
					botao.style.display = "none";
				}
			}
			
			//Função para auxiliar ordenação númerica do vetor
			Array.prototype.sortnum = function() {
				return this.sort(function(){return arguments[0] - arguments[1];});
			}
			
			//Função para ordenar o vetor
			function ordenar(){
				//Ordenação
				var vetordenado = vetor.sortnum();
				var aux = 0;
				//Trata novamente o vetor
				for (i=0;i<vetordenado.length;i++){
					if (aux == 0){
						vet = vetordenado[i];
					} else {
						if (aux % 10 == 0){
							vet = vet+"<br />"+vetordenado[i];
						} else {
							vet = vet+" - "+vetordenado[i];
						}
					}
					aux++;
				}
				//Exibe o vetor ordenado com números já sorteados na tela
				var campo=document.getElementById("vetor");
					campo.innerHTML=vet;
			}
			
			//Função para validar o formulário antes do envio
			function validar(form){
				//Se o campo 'de' estiver vazio: exibe mensagem de erro e impede envio
				if (form.de.value == ''){
					alert("Informe o primeiro campo");
					form.de.focus();
					return false;
				}
				//Se o campo 'ate' estiver vazio: exibe mensagem de erro e impede envio
				if (form.ate.value == ''){
					alert("Informe o segundo campo");
					form.ate.focus();
					return false;
				}
				//Se o campo 'ate' for menor do que o 'de': exibe mensagem de erro e impede envio
				if (form.ate.value < form.de.value){
					alert("O segundo número deve ser maior que o primeiro");
					form.de.focus();
					return false;
				}
				//Se o campo 'limite' estiver vazio: considera como limite o total de números no intervalo
				if (form.limite.value == ''){
					form.limite.value = (form.ate.value - form.de.value)+1;
				}
				return true;
			}
		</script>
	</head>
 
<?php
	//Se o formulário ainda não foi enviado
	if (!isset($_POST['de']) and !isset($_POST['ate'])){
	?>
		<body>
			<br />
			<table width='50%' align='center' border=1>
				<tr>
					<td align='center' width="30%">
						<h2>Sortear</h2>
						<form action='sorteio.php' method='POST' onsubmit="return validar(this);">
							De: <input type='text' name='de' id="de" size='3' maxlength='4' onkeypress="return somenteNumero(event);"/> 
							até: <input type='text' id="ate" name='ate' size='3' maxlength='4' onkeypress="return somenteNumero(event);"/>
							<br />
							<br />
							Limite: <input type='text' name='limite' id="limite" size='3' maxlength='4' onkeypress="return somenteNumero(event);"/> 
							<br />
							<br />
							<input type='submit' value="Iniciar" />
						</form>
						<br />
					</td>
				</tr>
			</table>
		</body>	
	<?php
	//Se formulário já foi enviado
	} else {
	?>
		<!-- Carrega função para sortear primeiro número -->
		<body onload="sortear(<?=$_POST['de']?>, <?=$_POST['ate']?>, <?=$_POST['limite']?>);">
			<br />
			<table width='50%' align='center' border=1>
				<tr>
					<td align='center'>
						<h2>Sorteio</h2>
						<p id="numero" style="font-size:72px"> </p>
						<button id="botao" onclick="sortear(<?=$_POST['de']?>, <?=$_POST['ate']?>, <?=$_POST['limite']?>)">Próximo</button>
						<br /><br /><br />
						Números já sorteados:
						<p id="vetor" style="font-size:25px"></p>
 
						<button id="botao" onclick="ordenar()">Ordenar</button>
						
						<br><br>
						<h3><a href="sorteio.php">Novo sorteio</a></h3>
					</td>
				</tr>
			</table>
		</body>
	<?
	}
	?>
</html>