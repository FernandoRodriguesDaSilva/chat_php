<?php include_once "db.php";
//"iniciar a sessao com a variavel de login"
// $nome_user = '$_SESSION['id_nome'];'
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet"> 

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			// verificação se página for encontrada 
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					// captura atraves do id=chat e insere uma resposta html
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			// pegando metodo GET e trazendo pra chat.php
			req.open('GET', 'chat.php', true);
			req.send();
		}
		setInterval(function(){ajax();}, 1000);
	</script>
	<title>Chat com PHP</title>

</head>
<!--ESTE ONLOAD AJAX É PARA ASSIM QUE A PÁGINA ABRIR ELE JÁ CARERGAR AS INFORMAÇÕES, SEM TER QUE ESPERAR 1 SEGUNDO PARA ISSO -->
<body onload="ajax();">

	<div id="conteudo">
		<div id="caixa-chat">
			<div id="chat">
				<!-- Conteudo é chamado em outra página -->
			</div>
		</div>

		<form method="POST" action="index.php">
			<input type="text" name="nome" placeholder="Preencha seu Nome">
			<input type="text" name="nome" placeholder="Preencha seu Nome">
			<textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<?php
// Inserindo os valores no banco de dados 
		if(isset($_POST['enviar'])){
			$nome = $_POST['nome'];
			$mensagem = $_POST['mensagem'];
			// inserir $nome_user aqui junto 
			$consulta = "INSERT INTO tb_chat (nome, mensagem) VALUES ('$nome', '$mensagem')";
			$executar = $conexao->query($consulta);
			if($executar){
				echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
			}
		}
		?>
	</div>
</body>
</html>