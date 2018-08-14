<?php 

// BANCO DE DADOS SERVIDOR LOCAL XAMPP
$servidor = "localhost";
$usuario = "root";
$password = "root";
$bd = "chat_bd";  

//BANCO DE DADOS HOSPEDAGEM UMBLER
/*$servidor = "mysql552.umbler.com";
$usuario = "hugochat";
$password = "senhaChat";
$bd = "chat_bd";*/

$conexao = new mysqli($servidor,$usuario,$password,$bd);

function formatarData($data){
	return date('H:i | d-m-Y', strtotime($data));

}


 ?>